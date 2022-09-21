<?php

namespace App\Command;

use App\Entity\City;
use App\Repository\CityRepository;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Exception;
use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;


class ImportCityCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'csv:import';
    private CityRepository $cityRepository;
    private EntityManagerInterface $em;


    public function __construct(CityRepository $cityRepository, EntityManagerInterface $em)
    {
        parent::__construct();
        $this->cityRepository = $cityRepository;
        $this->em = $em;
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $io = new SymfonyStyle($input, $output);
        $io->title('Import starting...');

        $csv = Reader::createFromPath('shared/cities.csv', 'r');
        $csv->setHeaderOffset(0);

        $io->progressStart(count($csv));

        foreach ($csv as $arrCity) {
            $this->createOrUpdateCity($arrCity);
            $io->progressAdvance();
        }

        $this->em->flush();
        $io->progressFinish();
        $io->success('import finished');

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }

    private function createOrUpdateCity(array $arrCity):void
    {
        // check existe

        $city = $this->cityRepository->findOneBy(["inseeCode" => $arrCity['insee_code']]);
        if ($city) {
            return;
        }

        $city = new City();
        $city
            ->setInseeCode($arrCity['insee_code'])
            ->setCityCode($arrCity['city_code'])
            ->setZipCode($arrCity['zip_code'])
            ->setLabel($arrCity['label'])
            ->setLatitude($arrCity['latitude'])
            ->setLongitude($arrCity['longitude'])
            ->setDepartmentName($arrCity['department_name'])
            ->setDepartmentNumber($arrCity['department_number'])
            ->setRegionName($arrCity['region_name'])
            ->setRegionGeoJsonName($arrCity['region_geojson_name']);


        $this->em->persist($city);
    }
}