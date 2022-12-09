import { Controller } from '@hotwired/stimulus';
// import PhotoSwipeLightbox from 'photoswipe/lightbox';
// import 'photoswipe/style.css';
import MiniMasonry from "minimasonry";
import BigPicture from 'bigpicture'


export default class extends Controller
{
    static targets = ["output","imglink"]

    connect() {
        super.connect();
        const masonry = new MiniMasonry({
            container: '.gallery',
            surroundingGutter: false,
            gutterX: 40,
            gutterY: 10
        });
    }

    increase(){
        let count = +this.outputTarget.textContent;
        count++;
        this.outputTarget.textContent=count;
    }

    full(e){
        e.preventDefault();

        console.log(e.target)
        const link = e.currentTarget
        console.log(link)
        BigPicture({
            el: e.target,
            imgSrc: link.href,
            noLoader: false,
        })
    }
}