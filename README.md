# Convertr Symfony Code Test

We've built a very simple tracking app using Symfony 3.1.3. We've littered the code with bad practises and issues, which we would like you to improve and fix. We're also missing a core feature, Impression tracking.

Looking at the entire codebase, we would like you to update and return the project to us with a breakdown of what you've changed and why you did it. You can add your notes to the bottom of this readme file. 
Please return your completed codetest in a zip file, or on a **private** git repository (we do not want the test being publicly available).

We expect you to use services, repositories and PSR standards where appropriate.

Tasks:

1. We would like you to add a simple impression tracker which will help us track how many times an email or online ad has been viewed.
    * The controller should return an image response - as impressions tend to be embedded in emails using a `<img>` tag
    * An `Impression` entity will need to be created and related to the Link object (so a Link object will have both clicks and impressions related to it)
    * We should be able to increment the impressions of a specific link via a url such as `/impression?linkId=1` and store the `ip` address along with the `referringUrl` for each impression
    * The stats table should also be updated for each impression per link

2. We've littered the codebase with bad things. We'd like you to update the code where you see fit.
	* We'd expect you to implement best practices
	* Refactor any poor quality code
	* Perhaps cover features with unit tests
	* Feel free to resturcture the code / documents in anyway you see fit
	
3. Think about performance
	* Our app is expected to handle a lot of traffic, particulaly impressions
	
	
### Set up

Install docker-composer

Run `docker-compose up -d` in the root of the project
Then run:

`docker exec convertr-code-test-php-fpm composer install` followed by `docker exec convertr-code-test-php-fpm bin/console doc:sch:up --force`

Visit http://localhost:1025/app_dev.php
	
### Hints & Tips

We'll be looking closely at the following things

* Accuracy of statistics in high traffic scenarios
* Caching considerations to improve performance
* Structure and patterns of code
* We want to see your best code


### Your notes:
