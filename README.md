## Test redis for store session in Symfony
- postgres SQL install with docker
- login with user: dang@yahoo.com ; password: 123456
- install php-redis extension for ubuntu

## Import Data from command line
- tuto YohanDev
- use library league/csv for csv file manip.
- Use symfony style command
- Add index to insee_code for searching performance

Verify by:
```sql
select *
from pg_indexes
where tablename not like 'pg%';

```
## Optimization Image
- Use LiipImage (Yohan dev)