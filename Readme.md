Notes:

1. This is a self contained, dockarized app.
2. It includes a mysql instance which will ingest the normalized_customers.sql file <br/>
    and create the necessary tables and seed the data derived from the customer_data.csv file that you provided.
3. Since this is such a small application I did not see a need to create api token authentication which would normally apply to every api endpoint.
4. Backend api endpoint can be tested from the browser at <code>http://localhost:8000/api/customers</code>


Installation:

+ Please ensure that docker is installed and a docker daemon is running.
+ Please ensure no other mysql containers are running.
+ Clone the git repo and inside the root folder build the docker container with the following command: <br/>
<code>docker-compose up --build</code>

