## 1000px Web Application

This application is a simple client to display 500px's most popular shots. 
1000px is designed to be simple, user friendly and responsive to fit any device. 


**[>> Here is a quick video demo. <<](https://youtu.be/XIMaQ1LgGas)**


## Technology choices

When building this application, I made several calls on which technology I used according to the specifications.

### Backend technology

1000px is built using [Laravel framework](https://laravel.com/) on PHP for the following reasons:
* Very easy to install, one command. Very easy to reproduce. 
* Highly scalable 
* Built following the MVC pattern
* Comparable to Ruby on Rails
* Perfect for simple applications
* Great performances

We only use Laravel as the **controller** part of our application to send the **model** (500px shots)
 to our view. Note that this framework is only used at 1% of its features here. 
 So this application can be improved in many ways using Laravel (Login, Upload, other Apis...).
 
The main (only) controller, is located under `app/Http/Controllers/ApplicationController.php`.
This is where the API call is made and all the backend code is run.

### Frontend technologies

* [Vue.js](https://vuejs.org/): lightweight modern Javascript framework, really easy to deploy and perfect to handle JSON data. 
It will handle here the **view** of the application.
* [Gulp](http://gulpjs.com/): load our assets and make them ready for production as well as maintaining them up to date later. 
* [SASS](http://sass-lang.com/): to compile and organize our stylesheet as well as managing Bootstrap. 

Some other libraries are used: 
* [jQuery](https://jquery.com/): Enhancing our Javascript and making our scripts cleaner and more efficient. 
* [Masonry](http://masonry.desandro.com/): Used to create a grid layout of the photos. 

Most of the application script is located in `resources/assests/js/app.js`, all assets are compiled to be optimized.  

## How to Install? 

1. Fork the repository on your side. 
2. Install Vagrant or place it on a web server.
3. Once in the directory call `npm install`.
4. You are ready to go! Make a call to `url/to/1000px/public`, you can use a pretty URL in your host file to use 1000px.app instead. 

## Improvements 

This application was built within a day. It can be improved and will be improved. The main points are: 

* [Images Loaded](https://www.npmjs.com/package/imagesloaded) to optimize how the images are being loaded. 
* Errors handling in the backend. Some errors might not been escaped as I did not succeeded to reproduce API failure. 
* Browsers fallback for any browser that do not support JS or the Flex properties.

## About 1000px 

This application is free to use and developed under a GPL license. 
Feel free to use it for your project, any new commit is welcome. 

For any question, feel free to contact me at francois.forest@y2f-design.fr