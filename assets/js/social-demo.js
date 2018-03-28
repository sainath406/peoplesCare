
WebFontConfig = {
  google: { families: [ 'Lato:400,700,300:latin' ] }
};
(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();

// Initialize Share-Buttons
$.contactButtons({
  effect  : 'slide-on-scroll',
  buttons : {
    'facebook':   { class: 'facebook-f', use: true, link: ' https://www.facebook.com/peoplesdental', extras: 'target="_blank"' },
    'linkedin':   { class: 'linkedin', use: true, link: 'https://www.linkedin.com/groups/10313023/profile', extras: 'target="_blank"' },
    'google':     { class: 'gplus',    use: true, link: 'https://plus.google.com/112730505097502552096/videos',extras: 'target="_blank"'},
    'twitter':   { class: 'twitter',   use: true, link: 'https://twitter.com/info97939215/lists',extras: 'target="_blank"' },
  }
});