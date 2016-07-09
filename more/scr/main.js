window.onload = Initiate;

var Slide;
var ThisSlide = 0;
var SlideInterval;
var SlideAnimation = false;
var AutoSlideToggle = true;
var CarouselToggle = false;
var DisplayMiniatures = true;
var CarouselCurrent = 0;
var CarouselBeg;
var CarouselEnd;
var CarouselLength;
var Dispersion;
var Miniature;
var MiniatureWidth = 100;
var MiniatureLength;
var WindowWidth;

function Initiate() {
    SetToggle();
    SetToggleSubMenu();
    SetCookies();
    var x = window.location.href;
    x = x.substr((x.lastIndexOf("/")) + 1);
    if (x == "gallery") SetGallery();
    if (x == "video") SetVideo();
    var x = window.location.href;
    if (x.indexOf("admin-panel-support") > -1) SetToggleIcons();
}

function SetToggle() {
    var x = document.getElementsByClassName("ToggleImageOnOff");
    for (var i = 0; i < x.length; i++) {
        x[i].addEventListener("mouseover", ToggleOn);
        x[i].addEventListener("mouseout", ToggleOff);
    }
}

function ToggleOn() {
    this.src = this.src.replace(/-off/, "-on");
}

function ToggleOff(x) {
    this.src = this.src.replace(/-on/, "-off");
}

function SetToggleSubMenu() {
    var x = document.getElementsByClassName("ToggleSubMenuOnOff");
    for (var i = 0; i < x.length; i++) {
        $(x[i]).on("click", function (event) {
            event.preventDefault();
        });
        $(x[i]).on("click", ToggleSubMenu);
    }
    $('main').on("click", HideSubMenu);
    $('#main-header').on("click", HideSubMenu);
    $('#main-footer').on("click", HideSubMenu);
}

function ToggleSubMenu() {
    var z = document.getElementsByClassName("submenu");
    var replace = false;
    if (typeof ToggleSubMenu.active == 'undefined' || ToggleSubMenu.active == false) {
        ToggleSubMenu.active = true;
        var x = this.href.toString();
        x = x.substr((x.lastIndexOf("/")) + 1);
        x += "-submenu";
        x = document.getElementById(x.toLowerCase());
        for (var i = 0; i < z.length; i++) {
            if ($(z[i]).is(":visible") && z[i] != x) {
                $(z[i]).slideToggle("slow");
                replace = true;
            }
        }
        if (replace) {
            setTimeout(function () {
                $(x).slideToggle("slow", function () {
                    ToggleSubMenu.active = false;
                });
            }, 750);
        } else $(x).slideToggle("slow", function () {
            ToggleSubMenu.active = false;
        });
    }
}

function HideSubMenu() {
    var z = document.getElementsByClassName("submenu");
    if (typeof ToggleSubMenu.active == 'undefined' || ToggleSubMenu.active == false) {
        ToggleSubMenu.active = true;
        for (var i = 0; i < z.length; i++) {
            if ($(z[i]).is(":visible")) {
                $(z[i]).slideToggle("slow", function () {
                    ToggleSubMenu.active = false;
                });
            }
        }
        ToggleSubMenu.active = false;
    }
}

function SetCookies() {
    var cookie = getCookie("registered");
    if (cookie != "") {
        HideCookiesInfo();
    } else {
        ShowCookiesInfo();
    }
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        if (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function ShowCookiesInfo() {
    var tmp = document.getElementById("cookies");
    tmp.style.display = "block";
}

function HideCookiesInfo() {
    var tmp = document.getElementById("cookies");
    tmp.style.display = "none";
}

function AllowCookies() {
    setCookie("registered", "yes", 365);
    HideCookiesInfo();
}

function SetGallery() {
    $('#left-arrow').on("click", PreviousSlide);
    $('#right-arrow').on("click", NextSlide);
    Slide = document.getElementsByClassName("slider");
    console.log(Slide);
    console.log("END");
    SetGalleryMiniatures();
    $(Slide[ThisSlide]).fadeIn();
    $(window).resize(SetBackground);
    SetBackground();
    StartInterval();
}

function PreviousSlide() {
    if (AutoSlideToggle) {
        StopInterval();
        SlideLeft();
        StartInterval();
    } else {
        SlideLeft();
    }
}

function NextSlide() {
    if (AutoSlideToggle) {
        StopInterval();
        SlideRight();
        StartInterval();
    } else {
        SlideRight();
    }
}

function StartInterval() {
    SlideInterval = setInterval(SlideRight, 5000);
}

function StopInterval() {
    clearInterval(SlideInterval);
}

function SlideLeft() {
    if (!SlideAnimation) {
        SlideAnimation = true;
        var tmp = Slide[ThisSlide];
        $(tmp).hide("slide", { direction: "right", queue: false }, 1000);
        if (--ThisSlide < 0) ThisSlide = --Slide.length;
        tmp = Slide[ThisSlide];
        if (CarouselToggle) SlideCarouselLeft();
        else SlideMiniatureLeft();
        $(tmp).show("slide", { direction: "left", queue: false }, 1000, function () {
            SlideAnimation = false;
        });
    }
}

function SlideRight() {
    if (!SlideAnimation) {
        SlideAnimation = true;
        var tmp = Slide[ThisSlide];
        $(tmp).hide("slide", { direction: "left", queue: false }, 1000);
        if (++ThisSlide >= Slide.length) ThisSlide = 0;
        tmp = Slide[ThisSlide];
        if (CarouselToggle) SlideCarouselRight();
        else SlideMiniatureRight();
        $(tmp).show("slide", { direction: "right", queue: false }, 1000, function () {
            SlideAnimation = false;
        });
    }
}

function PreviousVideo() {
    if (!SlideAnimation) {
        SlideAnimation = true;
        var tmp = Slide[ThisSlide];
        $(tmp).hide("slide", { direction: "right", queue: false }, 1000);
        if (--ThisSlide < 0) ThisSlide = --Slide.length;
        tmp = Slide[ThisSlide];
        if (CarouselToggle) SlideCarouselLeft();
        else SlideMiniatureLeft();
        $(tmp).show("slide", { direction: "left", queue: false }, 1000, function () {
            SlideAnimation = false;
        });
    }
}

function NextVideo() {
    if (!SlideAnimation) {
        SlideAnimation = true;
        var tmp = Slide[ThisSlide];
        $(tmp).hide("slide", { direction: "left", queue: false }, 1000);
        if (++ThisSlide >= Slide.length) ThisSlide = 0;
        tmp = Slide[ThisSlide];
        if (CarouselToggle) SlideCarouselRight();
        else SlideMiniatureRight();
        $(tmp).show("slide", { direction: "right", queue: false }, 1000, function () {
            SlideAnimation = false;
        });
    }
}

function SetGalleryMiniatures() {
    var Min = document.getElementById("miniature-container");
    for (var i = 0; i < Slide.length; i++) {
        var tmp = document.createElement("img");
        tmp.setAttribute("src", Slide[i].src);
        tmp.setAttribute("id", i);
        tmp.setAttribute("class", "miniature inactive");
        tmp.setAttribute("alt", "miniature " + i);
        Min.appendChild(tmp);
        $(tmp).on("click", SetSlide);
    }
    Miniature = document.getElementsByClassName("miniature");
    MiniatureLength = Miniature.length - 1;
    $("#" + CarouselCurrent.toString()).attr("class", "miniature active");
    $(window).resize(SetCarouselSettings);
    SetCarouselSettings();
}

function SetBackground() {
    $("#slider-background").height($(Slide[0]).height());
}

function SetVideoBackground() {
    if ($(window).innerWidth() > 986) $("#slider-background").height($(Slide[0]).height() + 175);
    else $("#slider-background").height($(Slide[0]).height() + 100);
}

function SetVideo() {
    $('#left-arrow').on("click", PreviousVideo);
    $('#right-arrow').on("click", NextVideo);
    Slide = document.getElementsByClassName("video-slider");
    SetVideoMiniatures();
    $(Slide[ThisSlide]).fadeIn();
    $(window).resize(SetVideoBackground);
    $(window).resize(SetMiddle);
    SetMiddle();
    SetVideoBackground();
}

function SlideCarouselLeft() {
    $("#" + CarouselCurrent.toString()).attr("class", "miniature inactive");
    if (--CarouselCurrent < 0) CarouselCurrent = MiniatureLength;
    $("#" + CarouselCurrent.toString()).attr("class", "miniature active");
    HideMiniatures();
    SetCarouselBegEnd();
}

function SlideCarouselRight() {
    $("#" + CarouselCurrent.toString()).attr("class", "miniature inactive");
    if (++CarouselCurrent > MiniatureLength) CarouselCurrent = 0;
    $("#" + CarouselCurrent.toString()).attr("class", "miniature active");
    HideMiniatures();
    SetCarouselBegEnd();
}

function SetCarouselSlide(x) {
    $("#" + CarouselCurrent.toString()).attr("class", "miniature inactive");
    HideMiniatures();
    CarouselCurrent = parseInt(x);
    SetCarouselBegEnd();
    $("#" + CarouselCurrent.toString()).attr("class", "miniature active");
}

function SlideMiniatureLeft() {
    $("#" + CarouselCurrent.toString()).attr("class", "miniature inactive");
    if (--CarouselCurrent < 0) CarouselCurrent = MiniatureLength;
    $("#" + CarouselCurrent.toString()).attr("class", "miniature active");
}

function SlideMiniatureRight() {
    $("#" + CarouselCurrent.toString()).attr("class", "miniature inactive");
    if (++CarouselCurrent > MiniatureLength) CarouselCurrent = 0;
    $("#" + CarouselCurrent.toString()).attr("class", "miniature active");
}

function SetMiniatureSlide(x) {
    $("#" + CarouselCurrent.toString()).attr("class", "miniature inactive");
    CarouselCurrent = parseInt(x);
    $("#" + CarouselCurrent.toString()).attr("class", "miniature active");
}

function SetCarouselBegEnd() {
    CarouselBeg = CarouselCurrent;
    CarouselEnd = CarouselBeg + CarouselLength - 1;
    if (CarouselEnd > MiniatureLength) {
        CarouselBeg -= (CarouselEnd - MiniatureLength);
        CarouselEnd = MiniatureLength;
    }
    ShowMiniatures();
}

function SetSlide() {
    if (!SlideAnimation && this.id != ThisSlide) {
        if (AutoSlideToggle) StopInterval();
        SlideAnimation = true;
        var side = false;
        var tmp = Slide[ThisSlide];
        if (parseInt(this.id) > parseInt(ThisSlide)) {
            $(tmp).hide("slide", { direction: "left", queue: false }, 1000);
            side = true;
        } else $(tmp).hide("slide", { direction: "right", queue: false }, 1000);
        ThisSlide = this.id;
        if (CarouselToggle) SetCarouselSlide(ThisSlide);
        else SetMiniatureSlide(ThisSlide);
        tmp = Slide[ThisSlide];
        if (side) {
            $(tmp).show("slide", { direction: "right", queue: false }, 1000, function () {
                SlideAnimation = false;
            });
        } else {
            $(tmp).show("slide", { direction: "left", queue: false }, 1000, function () {
                SlideAnimation = false;
            });
        }
        if (AutoSlideToggle) StartInterval();
    }
}

function SetVideoSlide() {
    if (!SlideAnimation && this.id != ThisSlide) {
        SlideAnimation = true;
        var side = false;
        var tmp = Slide[ThisSlide];
        if (parseInt(this.id) > parseInt(ThisSlide)) {
            $(tmp).hide("slide", { direction: "left", queue: false }, 1000);
            side = true;
        } else $(tmp).hide("slide", { direction: "right", queue: false }, 1000);
        ThisSlide = this.id;
        if (CarouselToggle) SetCarouselSlide(ThisSlide);
        else SetMiniatureSlide(ThisSlide);
        tmp = Slide[ThisSlide];
        if (side) {
            $(tmp).show("slide", { direction: "right", queue: false }, 1000, function () {
                SlideAnimation = false;
            });
        } else {
            $(tmp).show("slide", { direction: "left", queue: false }, 1000, function () {
                SlideAnimation = false;
            });
        }
    }
}

function SetCarouselSettings() {
    var tmp = true;
    HideMiniatures();
    CarouselLength = 11;
    WindowWidth = window.innerWidth;
    if (WindowWidth > 1000) {
        if (MiniatureLength * MiniatureWidth < WindowWidth) {
            CarouselToggle = false;
            DisplayMiniatures = true;
            CarouselLength = MiniatureLength;
            ShowMiniatures();
        } else {
            CarouselToggle = true;
            DisplayMiniatures = true;
            while (tmp) {
                if ((CarouselLength * MiniatureWidth) > WindowWidth) {
                    tmp = false;
                    CarouselLength -= 2;
                } else {
                    if (CarouselLength < MiniatureLength) {
                        CarouselLength += 2;
                    } else if (CarouselLength == MiniatureLength) {
                        tmp = false;
                    } else {
                        CarouselLength -= 2;
                        tmp = false;
                    }
                }
            }
            Dispersion = Math.floor(CarouselLength / 2);
            SetCarouselBegEnd();
        }
    } else {
        DisplayMiniatures = false;
        CarouselToggle = false;
        HideMiniatures();
    }
}

function ShowMiniatures() {
    if (CarouselToggle) {
        for (var i = CarouselBeg; i <= CarouselEnd; i++) {
            Miniature[i].style.display = "inline";
        }
    } else if (DisplayMiniatures) {
        for (var i = 0; i <= MiniatureLength; i++) {
            Miniature[i].style.display = "inline";
        }
    } else HideMiniatures();
}

function HideMiniatures() {
    for (var i = 0; i <= MiniatureLength; i++) {
        Miniature[i].style.display = "none";
    }
}

function SetVideoMiniatures() {
    var Min = document.getElementById("miniature-container");
    for (var i = 0; i < Slide.length; i++) {
        $(Slide[i]).on('ended', NextVideo);
        var tmp = document.createElement("img");
        tmp.setAttribute("src", $(Slide[i]).attr('poster'));
        tmp.setAttribute("id", i);
        tmp.setAttribute("class", "miniature inactive");
        tmp.setAttribute("alt", "miniature " + i);
        Min.appendChild(tmp);
        $(tmp).on("click", SetVideoSlide);
    }
    Miniature = document.getElementsByClassName("miniature");
    MiniatureLength = Miniature.length - 1;
    $("#" + CarouselCurrent.toString()).attr("class", "miniature active");
    $(window).resize(SetCarouselSettings);
    SetCarouselSettings();
}

function SetMiddle() {
    var x = $(window).width();
    var y = $(Slide[0]).width();
    var z = (x - y) / 2;
    $(".video-slider").css('left', z);
}

function ToggleAutoSlider() {
    if (AutoSlideToggle) {
        StopInterval();
        AutoSlideToggle = false;
        ReplacePause();
    } else {
        AutoSlideToggle = true;
        ReplacePlay();
        NextSlide();
    }
}

function ReplacePlay() {
    var x = document.getElementById("pause-button");
    x.src = "img/menu/pause-off.png";
}

function ReplacePause() {
    var x = document.getElementById("pause-button");
    x.src = "img/menu/play-off.png";
}

function ToggleMute() {
    var x = document.getElementById("main-trailer");
    if (x.muted == true) {
        x.muted = false;
        ReplaceSoundOn();
    } else {
        x.muted = true;
        ReplaceSoundOff();
    }
}

function ReplaceSoundOn() {
    var m = document.getElementById("mute-button");
    m.src = "img/menu/soundon-off.png";
}

function ReplaceSoundOff() {
    var m = document.getElementById("mute-button");
    m.src = "img/menu/soundoff-off.png";
}

function SetToggleIcons() {
    var x = document.getElementsByClassName("ToggleIconsOnOff");
    for (var i = 0; i < x.length; i++) {
        x[i].addEventListener("click", ToggleIcon);
    }
}

function ToggleIcon() {
    var orders = document.getElementById('orders');
    var order_value = orders.value;
    var array = order_value.split(",");
    var index = array.indexOf(this.id);
    if (this.src.indexOf("-on") > -1) {
        this.src = this.src.replace(/-on/, "-off");
        if (index > -1) {
            array.splice(index, String(index).length);
        }
    } else {
        this.src = this.src.replace(/-off/, "-on");
        var i = 0;
        for (i = 0; i < array.length; i++) {
            if (parseInt(this.id) < parseInt(array[i])) break;
        }
        array.splice(i, 0, String(this.id));
    }
    orders.value = array.join();
    console.log(orders.value);
}