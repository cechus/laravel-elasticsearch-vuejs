# laravel-elasticsearch-vuejs

## Set up .env file
`cp .env.example .env`

added next lines and configure credentials of database
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
...
DB_PASSWORD=******


SEARCH_ENABLED=true
SEARCH_HOSTS=localhost:9200
```

## install dependeces

```bash
composer install
```


## configuration elastic search
### With docker:
- `docker run -d -p 9200:9200 elasticsearch`

[more info install with docker](https://www.elastic.co/guide/en/elasticsearch/reference/current/docker.html)

### Manual install

- `curl -L -O https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-5.6.4.deb` 
- `sudo dpkg -i elasticsearch-5.6.4.deb`
- `sudo /bin/systemctl daemon-reload`
- `sudo /bin/systemctl enable elasticsearch.service`
- `sudo systemctl start elasticsearch.service`
- `sudo service elasticsearch status`

or read [more info manual install](https://www.elastic.co/guide/en/elasticsearch/reference/current/deb.html)

**note:** the manual installation was not tested
### Test server eleasticsearch

`curl localhost:9200`

returning something similar

```json
{
    "name" : "C8XeV7v",
    "cluster_name" : "elasticsearch",
    "cluster_uuid" : "9rqQ4cw9R6G3ut8dGVy4Tw",
    "version" : {
        "number" : "5.6.9",
        "build_hash" : "877a590",
        "build_date" : "2018-04-12T16:25:14.838Z",
        "build_snapshot" : false,
        "lucene_version" : "6.6.1"
    },
    "tagline" : "You Know, for Search"
}
```
## run project
```bash
php artisan migrate
php artisan db:seed # will create 60000 records
# it could take more than 7 minutes
```
testing searching php, ruby, java or javascript (*P.D.* the title field has a relevance of 5)

*example search:* ruby dolore

