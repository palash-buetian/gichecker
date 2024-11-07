# GIChecker
## _The Government Interest Checker System_
### _Sylhet Mohanagar Revenue Circle_


The Government Interest Checker is an application  to check if government interest lies in a certain dag.It's easy and simple, just put the dag number on the search bar and it will automatically tell you if any government interest lies on that dag.

## Features
- Checks a dag aginst government interest.
- Checks Khas 
- Checks Vested property
- Checks Wakhaf
- Checks Debottor
- Checks both SA and BS
- Mouza selector

## Tech

GIChecker uses a number of open source projects to work properly:
- [PHP] - HTML enhanced for web apps!
- [MYSQL] - awesome web-based text editor
- [Twitter Bootstrap] - great UI boilerplate for modern web apps
- [jQuery] - jquery as we know.

And of course GIChecker itself is open source with a [public repository][git-repo-url]
 on GitHub.

## Installation

GIChecker requires [PHP](https://php.net/) v7+ to run.
### Steps:
1. Copy the code base to your web www folder.
2. Create a database.
3. Import the data 'gichecker_final' into the database. A table will be automatically created and data will be manipulated.
4. Or alternatively you can create a table with the following code.
```sh
   CREATE TABLE `interest_list` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `mouza` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `sa_jl` int DEFAULT NULL,
  `bs_jl` int DEFAULT NULL,
  `sa_dag` int DEFAULT NULL,
  `bs_dag` int DEFAULT NULL,
  `interest` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sa_dag` (`sa_dag`,`interest`,`sa_jl`),
  UNIQUE KEY `bs_dag` (`bs_dag`,`sa_jl`,`interest`)
) ENGINE=InnoDB AUTO_INCREMENT=8493 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
```

5. edit connection on ajax.php  
6. For production environments, sun the server...
7. Now open the browser and hit it-

```sh
php -S localhost:8000
```

```sh
127.0.0.1:8000
```
## It's Done!

## Screenshots
![Alt text](https://github.com/palash-buetian/gichecker/blob/68312f09ed84f7f2bf8eb8e49dfa725d71b0efb6/Screenshots/1.png "Homepage")
![Alt text](https://github.com/palash-buetian/gichecker/blob/68312f09ed84f7f2bf8eb8e49dfa725d71b0efb6/Screenshots/2.png "Search Result")

![Watch the video](https://github.com/palash-buetian/gichecker/blob/68312f09ed84f7f2bf8eb8e49dfa725d71b0efb6/Screenshots/screetcast.mov)

### License
MIT

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [git-repo-url]: <https://github.com/palash-buetian/gichecker>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [PHP]: <http://php.net>
   [MYSQL]: <http://mysql.com>
