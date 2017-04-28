<h1 align="center">Crowdplay</h1>

Created by: <a href="http://karenscheng.com" target="_newtab">Karen Cheng</a>

Live link coming soon!

### API Gitbook:

<a href="https://karenscheng.gitbooks.io/crowdplay/content/" target="_newtab">Crowdplay API</a>

## Getting Started

### Important information:

Apache port: 8888

Mysql port: 8889

Database name: crowdplay

``` bash
# install dependencies
npm install

# run migration
php artisan migrate

# serve at localhost:8888
npm run dev

```

## Using the app:

### Welcome screen

![alt-tag](https://github.com/karenscheng/laravel-project4/blob/master/public/homepage.png)

From here, you can either create a new playlist, view the instructions, check out the styleguide, or project credits.

### Information screen

![alt-tag](https://github.com/karenscheng/laravel-project4/blob/master/public/info.png)

Lost on where to start? These instructions should get you off to the races!

### Styleguide

![alt-tag](https://github.com/karenscheng/laravel-project4/blob/master/public/styleguide.png)

### Creating a new playlist

![alt-tag](https://github.com/karenscheng/laravel-project4/blob/master/public/newplaylist.png)

Enter any name for your playlist. Don't worry - you can change it later!

![alt-tag](https://github.com/karenscheng/laravel-project4/blob/master/public/editplaylist.png)

You will then be taken to this edit playlist screen, where you can add videos to your playlist! You can also edit your playlist name, video names, and delete videos. From here, you can play your playlist and the app will autoplay all of the videos in your playlist for you.

### Editing a playlist

![alt-tag](https://github.com/karenscheng/laravel-project4/blob/master/public/editvideoname.png)

When editing a video or playlist name, simply click the edit button next to the name, make your changes, and press "enter" on your keyboard.

### Playing a playlist

![alt-tag](https://github.com/karenscheng/laravel-project4/blob/master/public/playing.png)

This is what the app looks like when it's playing the playlist.

### Contributing to a playlist

![alt-tag](https://github.com/karenscheng/laravel-project4/blob/master/public/contribute.png)

To have someone contribute to a playlist you created, have them navigate to: 

```
/edit/{id}
```

where {id} is the playlist id. To find the playlist id, you can look in your url bar on the edit playlist page, and you should be able to see it like so:

```
/playlist/{id}
```

They can add any videos to the playlist, but only you will be able to delete videos or play it. To give someone admin rights, they can just change the 'edit' to 'playlist' in the url bar!

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
