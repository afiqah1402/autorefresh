# autorefreshapp
an auto refresh app sample

1. clone and checkout master for interval solution and wssolution for websocket solution

2. create database name: dummy_forfun and run dummy_forfun script in script folder

3. set virtual host to whatever name you like and change the base_url in config.php

4. run composer install

5. go to url <base_url>/public/employee/list if success then all went well.

extra 

6. for websocket run php appServer.php in wsservice/bin and refresh the page, you can see the command message shows that connection is successful

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