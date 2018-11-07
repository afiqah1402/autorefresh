# autorefreshapp
an auto refresh app sample

1. create database name: dummy_forfun and run dummy_forfun script

2. create tutorials folder in wamp/www 

3. then create autorefreshapp folder inside it

4. then clone this git into autorefreshapp folder

5. set virtual host name: tutorials.local point to tutorials folder

6. run composer install

7. go to url http://tutorials.local/autorefreshapp/employee/list if success then all went well

this app is to show that we can update the view without refreshing the page in angularjs. 

### this app is using angularjs and codeigniter
currently this working example shows that the view is updated with $interval every 5 sec. if there is an error of too much open file go to wamp server and empty all log files will solve the problem as of now. will implement socket to avoid this problem.

#### solution 1: branch master
this interval solution is working as of the moment but somehow it will create a problem of server caching as the client is open for request every 5 second. 

#### solution 2: branch wssolution
second solution is using websocket: ratchet (php websocket). although another solution might be better, but as of now this is the ideal solution. 
1. checkout to wssolution branch and run composer install in local
2. change BROADCAST_URL in application/config/constants.php file to ip address (of local).
3. run command: php appServer.php in <autorefreshappfolder>/wsservice/bin