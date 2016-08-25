# Convertr Symfony Code Test

We've built a very simple tracking app using Symfony 3.1.3. We've littered the code with bad practises and issues, which we would like you to improve and fix. We're also missing a core feature, Impression tracking.

Looking at the entire codebase, we would like you to update and return the project to us with a breakdown of what you've chnaged and why you did it. You can add your notes to the bottom of this readme file.

Tasks:

* We would like you to add a simple impression tracker.
    * The response type should be an image - as impressions tend to be embeded in emails
    * An Impression entity will need to be created and related to the Link object
    * The stats table should also be updated for each impression
    
* We've littered the codebase with bad things. We'd like you to comb through and update the code where you see fit.
	* We'd expect you to implement best practices
	* Refactor any poor quality code
	* Perhaps cover features with unit tests
	* Feel free to resturcture the code / documents in anyway you see fit
	
* Think about performance
	* Our app is expected to handle a lot of traffic, particulaly impressions
	
### Hints & Tips

We'll be looking closely at the following things

* Accuracy of statistics in high traffic scenarios
* Caching considerations to improve performance
* Structure and patterns of code
* We want to see your best code


### Your notes:

	