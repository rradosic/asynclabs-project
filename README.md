
# ASYNCLABS INTERVIEW PROJECT

The task was to implement streaming service of lorem ipsum words that will inspect similarity
between texts. 



## Installation
### Requirements

 - Docker

### Steps
 1. `git clone https://github.com/rradosic/asynclabs-project.git async-rradosic`
 2. `cd async-rradosic`
 3. `docker run --rm -v $(pwd)/ComparisonService:/app composer install`
 4. `docker run --rm -v $(pwd)/ReporterAPI:/app composer install`
 5. `docker-compose up`

 The main output should now be available http://localhost:8080/streamComparisonReport. Other endpoints include health checks for reporter api and the comparison service and they are available at :8080/health and :8079/health respectively. Redis cache is exposed at it's default port 6379.
 
 ## Architecture
 ![Architecture](https://i.ibb.co/C04n8Nt/Untitled-Document.png)

## Horizontal scaling
ReporterAPI service can be scaled horizontally to simulate a case of an overloaded API endpoint. It can be scaled with `docker-compose scale reporter_api=n` where n is the number of instances you want to create. HAProxy service will automatically load balance between all instances with the round robin method.
