## 1000px Web Application

This application is a simple client to display 500px's most popular shots. 
1000px is designed to be simple, user friendly and responsive to fit any device. 

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
 to our view. 

### Frontend technologies

* [Vue.js](https://vuejs.org/): lightweight modern Javascript framework, really easy to deploy and perfect to handle JSON data. 
It will handle here the **view** of the application.
* [Gulp](http://gulpjs.com/): load our assets and make them ready for production as well as maintaining them up to date later. 
* [SASS](http://sass-lang.com/): to compile and organize our stylesheet as well as managing Bootstrap. 

Some other libraries are used: 
* [jQuery](https://jquery.com/): Enhancing our Javascript and making our scripts cleaner and more efficient. 
* [Masonry](http://masonry.desandro.com/): Used to create a grid layout of the photos. 

## About 1000px 

This application is free to use and developed under a GPL license. 
Feel free to use it for your project, any new commit is welcome. 

For any question, feel free to contact me at francois.forest@y2f-design.fr