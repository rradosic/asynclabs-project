
# ASYNCLABS INTERVIEW PROJECT

The task was to implement streaming service of lorem ipsum words that will inspect similarity
between texts. 



## Installation
### Requirements

 - Docker

### Steps
 1. `git clone https://github.com/rradosic/asynclabs-project.git async-rradosic`
 2. `cd async-rradosic`
 3. `docker-compose up`
 
 ## Architecture
 ![Architecture](https://i.ibb.co/C04n8Nt/Untitled-Document.png)

## Horizontal scaling
ReporterAPI service can be scaled horizontally to simulate a case of an overloaded API endpoint. It can be scaled with `docker-compose scale web=n` where n is the number of instances you want to create. HAProxy service will automatically balance the load between all instances with the round robin method.
