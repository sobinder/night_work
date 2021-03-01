(function($)
{$.fn.Ticker=function(options)
{var defaults={pause:5000,fadeIn:800,fadeOut:800,delay:500,typewriter:!0,speed:35,cursor:'_'};var opts=$.extend({},defaults,options);return $(this).each(function()
{var list=$(this),typewriter={},interval;list.addClass('ticker-active').children(':first').css('display','block');function changeItem()
{var item=list.children(':first'),next=item.next(),copy=item.clone();clearTimeout(interval);$(copy).css('display','none').appendTo(list);item.fadeOut(opts.fadeOut,function()
{$(this).remove();if(opts.typewriter)
{typewriter.string=next.text();next.text('').css('display','block');typewriter.count=0;typewriter.timeout=setInterval(type,opts.speed)}
else{next.delay(opts.delay).fadeIn(opts.fadeIn,function()
{setTimeout(changeItem,opts.pause)})}})}
function type()
{typewriter.count++;var text=typewriter.string.substring(0,typewriter.count);if(typewriter.count>=typewriter.string.length)
{clearInterval(typewriter.timeout);setTimeout(changeItem,opts.pause)}
else if(opts.cursor)
{text+=' '+opts.cursor}
list.children(':first').text(text)}
if(list.find('li').length>1)
{interval=setTimeout(changeItem,opts.pause)}})}})(jQuery)