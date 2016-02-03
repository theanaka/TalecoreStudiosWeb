// Image viewer variables
var images;
var currentIndex;
var maxIndex;

var globalViewerImages;
var globalViewerCurrentIndex;
var globalViewerMaxIndex;

function SetupImageViewer()
{
    images = new Array();
    currentIndex = 0;

    $('#imageViewWrapper .imageWrapper').each(function(index){
        images[index] = $(this);

        $(this).removeClass('hide');
        if(index > 0){
            $(this).hide();
        }

        maxIndex = index;
    });

    if(maxIndex == 0){
        $('#navigateLeft').hide();
        $('#navigateRight').hide();
    }
}

function NextImage()
{
    var nextIndex = currentIndex + 1;
    if(nextIndex > maxIndex){
        nextIndex = 0;
    }

    images[nextIndex].show();
    images[nextIndex].css('left', 0);
    images[currentIndex].css('z-index', 2);
    images[nextIndex].css('z-index', 1);

    var imageSize = images[0].width();
    images[currentIndex].animate({
        left: -imageSize
        },
        800,
        function(){
            $(this).hide();
        }
    );
    currentIndex = nextIndex;
}

function PreviousImage()
{
    var nextIndex = currentIndex - 1;
    if(nextIndex < 0){
        nextIndex = maxIndex;
    }

    var imageSize = images[0].width();

    images[nextIndex].show();
    images[nextIndex].css('left', -imageSize);
    images[currentIndex].css('z-index', 1);
    images[nextIndex].css('z-index', 2);

    currentIndex = nextIndex;
    images[currentIndex].animate({
            left: 0
        },
        800,
        function(){
            $('#imageViewWrapper .imageWrapper').each(function(index){
                if(index != currentIndex){
                    $(this).hide();
                }
            });
        }
    );
}

function openOverlay()
{
    $('#overlay').show();
    $('#globalImageViewer').show();

    $('#globalImageViewer img.display').hide();
    $('#globalImageViewer iframe').hide();
}

function closeOverlay()
{
    $('#overlay').hide();
    $('#globalImageViewer').hide();
}

function setupGlobalImageViewer(currentElement)
{
    globalViewerImages = new Array();

    currentElement.parent().parent().find('img').each(function(index){
        globalViewerImages[index] = $(this);
    });

    index = 0;
    globalViewerImages.forEach(function(entry){
        if(entry.is(currentElement)){
            globalViewerCurrentIndex = index;
        }
        index ++;
    });

    globalViewerMaxIndex = globalViewerImages.length;
}

function openGlobalImageViewer(element)
{
    openOverlay();
    setupGlobalImageViewer(element);
    globalViewerSetImage(element);
}

function globalViewerSetImage(element) {
    var imgElement = $('#globalImageViewer img.display');
    var iframeElement = $('#globalImageViewer iframe');

    if (element.parent().hasClass('imageWrapper')) {
        imgElement.fadeOut(250, function () {

            imgElement.show();
            iframeElement.hide();

            imgElement.attr('src', element.attr('data'));
            imgElement.fadeIn(250);
        });
    } else if (element.parent().hasClass('videoWrapper')) {

        imgElement.hide();
        iframeElement.show();
        iframeElement.attr('src', element.attr('data'));

    }
}

$(document).ready(function(){
    SetupImageViewer();

    $('#imageViewWrapper .navigateLeft').on('click', function(){
        PreviousImage();
    });
    $('#imageViewWrapper .navigateRight').on('click', function(){
        NextImage();
    });

    $('#overlay').removeClass('hidden');
    $('#overlay').hide();
    $('#globalImageViewer').removeClass('hidden');
    $('#globalImageViewer').hide();
    $('.imageAlbum .imageWrapper *').on('click', function(){
       openGlobalImageViewer($(this));
    });

    $('.imageAlbum .videoWrapper *').on('click', function(){
        openGlobalImageViewer($(this));
    });

    $('#globalImageViewer .close').on('click', function(){
        closeOverlay();
    });

    $('#globalImageViewer .outerWrapper .navigateLeft').on('click', function() {
        globalViewerPrevious();
    });

    $('#globalImageViewer .outerWrapper .navigateRight').on('click', function() {
        globalViewerNext();
    });

});