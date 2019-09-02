$(function(){
    var userFeed = new Instafeed({
        get: 'user',
        userId: '11344467987',
        clientId: '8d81de8d9c9f4eee9daa6976d346bd68',
        accessToken: '11344467987.8d81de8.1dbbb640d6244eaca571d73d3e148cdc',
        resolution: 'standard_resolution',
        template: '<a href="{{link}}" target="_blank" id="{{id}}"><img width="80" src="{{image}}" /></a>',
        sortBy: 'most-recent',
        limit:6
    });
    userFeed.run();
});
