/**
 * Created by Administrator on 2017/2/8.
 */
var mySwiper = new Swiper('.swiper-container', {
    pagination : '.swiper-pagination',
    paginationClickable: true,
    prevButton:'.swiper-button-prev',
    nextButton:'.swiper-button-next',
    loop : true,
    onSlideChangeStart: function(swiper){
        var edgeTitle1=$('.edge-title1'),edgeDesc1=$('.edge-desc1'),edgeDuttons1=$('.edge-buttons1');
        var edgeTitle2=$('.edge-title2'),edgeDesc2=$('.edge-desc2'),edgeDuttons2=$('.edge-buttons2');
        var edgeTitle3=$('.edge-title3'),edgeDesc3=$('.edge-desc3'),edgeDuttons3=$('.edge-buttons3');
        if(swiper.activeIndex===1 || swiper.activeIndex == 4){
            edgeTitle1.addClass('mk-background-stretch1');
            edgeDesc1.addClass('mk-background-stretch2');
            edgeDuttons1.addClass('mk-background-stretch3');
        }else{
            edgeTitle1.removeClass('mk-background-stretch1');
            edgeDesc1.removeClass('mk-background-stretch2');
            edgeDuttons1.removeClass('mk-background-stretch3');
        }
        if(swiper.activeIndex===2){
            edgeTitle2.addClass('mk-background-stretch1');
            edgeDesc2.addClass('mk-background-stretch2');
            edgeDuttons2.addClass('mk-background-stretch3');
        }else {
            edgeTitle2.removeClass('mk-background-stretch1');
            edgeDesc2.removeClass('mk-background-stretch2');
            edgeDuttons2.removeClass('mk-background-stretch3');
        }
        if(swiper.activeIndex===3){
            edgeTitle3.addClass('mk-background-stretch1');
            edgeDesc3.addClass('mk-background-stretch2');
            edgeDuttons3.addClass('mk-background-stretch3');
        }else {
            edgeTitle3.removeClass('mk-background-stretch1');
            edgeDesc3.removeClass('mk-background-stretch2');
            edgeDuttons3.removeClass('mk-background-stretch3');
        }
    }
});

function IsPc(){
    var userAgentInfo=navigator.userAgent;
    var Agents=["Android","iPhone","SymbianOS","Windows Phone","iPad","iPod"];
    var flag=true;
    for(var v=0;v<Agents.length;v++){
        if(userAgentInfo.indexOf(Agents[v])>0){
            flag=false;
            break;
        }
    }
    return flag;

}
var flag=IsPc();

if(flag==true){
    (function () {
        var bodys=$('body');
        var numbers01=$('.numbers__card--01'),numbers02=$('.numbers__card--02'),numbers03=$('.numbers__card--03'),numbers05=$('.numbers__card--05'),numbers06=$('.numbers__card--06');
        bodys.on("mousewheel DOMMouseScroll", function (e) {
            var js_intro_look=document.getElementsByClassName('js-intro-look')[0];
            var actualTop=js_intro_look.getBoundingClientRect().top;
            var oEv= e.originalEvent,wheelRange=oEv.wheelDelta ? -oEv.wheelDelta/120 : (oEv.detail || 0)/3;

            if(wheelRange==1){

                if(actualTop<=780){
                    numbers01.addClass('card_01');
                    numbers02.addClass('card_02');
                    numbers03.addClass('card_03');
                    numbers05.addClass('card_05');
                    numbers06.addClass('card_06');
                }
                if(actualTop<=-780){
                    numbers01.removeClass('card_01');
                    numbers02.removeClass('card_02');
                    numbers03.removeClass('card_03');
                    numbers05.removeClass('card_05');
                    numbers06.removeClass('card_06');
                }
            }else if(wheelRange==-1){
                if(actualTop>=-780){
                    numbers01.addClass('card_01');
                    numbers02.addClass('card_02');
                    numbers03.addClass('card_03');
                    numbers05.addClass('card_05');
                    numbers06.addClass('card_06');
                }
                if(actualTop >= 510){
                    numbers01.removeClass('card_01');
                    numbers02.removeClass('card_02');
                    numbers03.removeClass('card_03');
                    numbers05.removeClass('card_05');
                    numbers06.removeClass('card_06');
                }
            }
            /*两大原理 bin*/
            var categories01=$('.categories__card--01'),categories02=$('.categories__card--02'),categories03=$('.categories__card--03'),categories04=$('.categories__card--04');
            var categories=document.getElementsByClassName('categories')[0];
            var categoTop=categories.getBoundingClientRect().top;
            bodys.on("mousewheel DOMMouseScroll", function (e) {
                if(wheelRange==1){
                    if(categoTop<=600){
                        categories01.addClass('categories_01');
                        categories02.addClass('categories_02');
                        categories03.addClass('categories_03');
                        categories04.addClass('categories_04');
                    }
                    if(categoTop<=0){
                        categories01.removeClass('categories_01');
                        categories02.removeClass('categories_02');
                        categories03.removeClass('categories_03');
                        categories04.removeClass('categories_04');
                    }
                }else if(wheelRange==-1){
                    if(categoTop>=-600){
                        categories01.addClass('categories_01');
                        categories02.addClass('categories_02');
                        categories03.addClass('categories_03');
                        categories04.addClass('categories_04');
                    }
                    if(categoTop>=100){
                        categories01.removeClass('categories_01');
                        categories02.removeClass('categories_02');
                        categories03.removeClass('categories_03');
                        categories04.removeClass('categories_04');
                    }
                }


            });
            /*次数决定方向 bin*/
            var frequency02=$('.frequency__card--02'),frequency03=$('.frequency__card--03'),frequency04=$('.frequency__card--04'),frequency05=$('.frequency__card--05');
            var frequency=document.getElementsByClassName('frequency')[0];
            var frequenTop=frequency.getBoundingClientRect().top;

            /*三剑合一策略 bin*/
            var photOne=$('.tandem__photo.photo-one'),photoTwo=$('.tandem__photo.photo-two');
            var tandem=document.getElementsByClassName('tandem__box')[0];
            var tandemBox=tandem.getBoundingClientRect().top;

            bodys.on("mousewheel DOMMouseScroll", function () {

                if(wheelRange==1){
                    if(frequenTop<=1000){
                        frequency02.addClass('frequency_02');
                        frequency03.addClass('frequency_03');
                        frequency04.addClass('frequency_04');
                        frequency05.addClass('frequency_05');

                    }
                    if(frequenTop<=0){
                        frequency02.removeClass('frequency_02');
                        frequency03.removeClass('frequency_03');
                        frequency04.removeClass('frequency_04');
                        frequency05.removeClass('frequency_05');
                    }
                    /*三剑合一 bin*/
                    if(tandemBox<850){
                        photOne.addClass('animte-photo-one');
                        photoTwo.addClass('animte-photo-two');
                    }
                    if(tandemBox<-100){
                        photOne.removeClass('animte-photo-one');
                        photoTwo.removeClass('animte-photo-two');
                    }

                }else if(wheelRange==-1){
                    if(frequenTop>=-600){
                        frequency02.addClass('frequency_02');
                        frequency03.addClass('frequency_03');
                        frequency04.addClass('frequency_04');
                        frequency05.addClass('frequency_05');
                    }
                    if(frequenTop>=100){
                        frequency02.removeClass('frequency_02');
                        frequency03.removeClass('frequency_03');
                        frequency04.removeClass('frequency_04');
                        frequency05.removeClass('frequency_05');
                    }
                    /*三剑合一 bin*/
                    if(tandemBox>=-500){
                        photOne.addClass('animte-photo-one');
                        photoTwo.addClass('animte-photo-two');
                    }
                    if(tandemBox>=700){
                        photOne.removeClass('animte-photo-one');
                        photoTwo.removeClass('animte-photo-two');
                    }
                }

            });


        });



    })();
    console.log('PC端');
}else{
    (function () {
        var bodys=$('body');
        var numbers01=$('.numbers__card--01'),numbers02=$('.numbers__card--02'),numbers03=$('.numbers__card--03'),numbers05=$('.numbers__card--05'),numbers06=$('.numbers__card--06');
        bodys.on("mousewheel DOMMouseScroll", function (e) {
            var js_intro_look=document.getElementsByClassName('js-intro-look')[0];
            var actualTop=js_intro_look.getBoundingClientRect().top;
            var oEv= e.originalEvent,wheelRange=oEv.wheelDelta ? -oEv.wheelDelta/120 : (oEv.detail || 0)/3;

            if(wheelRange==1){
                if(actualTop<=780){
                    numbers01.addClass('card_01');
                    numbers02.addClass('card_02');
                    numbers03.addClass('card_03');
                    numbers05.addClass('card_05');
                    numbers06.addClass('card_06');
                }
                if(actualTop<=-780){
                    numbers01.removeClass('card_01');
                    numbers02.removeClass('card_02');
                    numbers03.removeClass('card_03');
                    numbers05.removeClass('card_05');
                    numbers06.removeClass('card_06');
                }
            }else if(wheelRange==-1){
                if(actualTop>=-780){
                    numbers01.addClass('card_01');
                    numbers02.addClass('card_02');
                    numbers03.addClass('card_03');
                    numbers05.addClass('card_05');
                    numbers06.addClass('card_06');
                }
                if(actualTop >= 510){
                    numbers01.removeClass('card_01');
                    numbers02.removeClass('card_02');
                    numbers03.removeClass('card_03');
                    numbers05.removeClass('card_05');
                    numbers06.removeClass('card_06');
                }
            }
            /*两大原理 bin*/
            var categories01=$('.categories__card--01'),categories02=$('.categories__card--02'),categories03=$('.categories__card--03'),categories04=$('.categories__card--04');
            var categories=document.getElementsByClassName('categories')[0];
            var categoTop=categories.getBoundingClientRect().top;
            bodys.on("mousewheel DOMMouseScroll", function (e) {
                if(wheelRange==1){
                    if(categoTop<=600){
                        categories01.addClass('categories_01');
                        categories02.addClass('categories_02');
                        categories03.addClass('categories_03');
                        categories04.addClass('categories_04');
                    }
                    if(categoTop<=0){
                        categories01.removeClass('categories_01');
                        categories02.removeClass('categories_02');
                        categories03.removeClass('categories_03');
                        categories04.removeClass('categories_04');
                    }
                }else if(wheelRange==-1){
                    if(categoTop>=-600){
                        categories01.addClass('categories_01');
                        categories02.addClass('categories_02');
                        categories03.addClass('categories_03');
                        categories04.addClass('categories_04');
                    }
                    if(categoTop>=100){
                        categories01.removeClass('categories_01');
                        categories02.removeClass('categories_02');
                        categories03.removeClass('categories_03');
                        categories04.removeClass('categories_04');
                    }
                }


            });
            /*次数决定方向 bin*/
            var frequency02=$('.frequency__card--02'),frequency03=$('.frequency__card--03'),frequency04=$('.frequency__card--04'),frequency05=$('.frequency__card--05');
            var frequency=document.getElementsByClassName('frequency')[0];
            var frequenTop=frequency.getBoundingClientRect().top;

            /*三剑合一策略 bin*/
            var photOne=$('.tandem__photo.photo-one'),photoTwo=$('.tandem__photo.photo-two');
            var tandem=document.getElementsByClassName('tandem__box')[0];
            var tandemBox=tandem.getBoundingClientRect().top;

            bodys.on("mousewheel DOMMouseScroll", function () {

                if(wheelRange==1){
                    if(frequenTop<=1000){
                        frequency02.addClass('frequency_02');
                        frequency03.addClass('frequency_03');
                        frequency04.addClass('frequency_04');
                        frequency05.addClass('frequency_05');

                    }
                    if(frequenTop<=0){
                        frequency02.removeClass('frequency_02');
                        frequency03.removeClass('frequency_03');
                        frequency04.removeClass('frequency_04');
                        frequency05.removeClass('frequency_05');
                    }
                    /*三剑合一 bin*/
                    if(tandemBox<850){
                        photOne.addClass('animte-photo-one');
                        photoTwo.addClass('animte-photo-two');
                    }
                    if(tandemBox<-100){
                        photOne.removeClass('animte-photo-one');
                        photoTwo.removeClass('animte-photo-two');
                    }

                }else if(wheelRange==-1){
                    if(frequenTop>=-600){
                        frequency02.addClass('frequency_02');
                        frequency03.addClass('frequency_03');
                        frequency04.addClass('frequency_04');
                        frequency05.addClass('frequency_05');
                    }
                    if(frequenTop>=100){
                        frequency02.removeClass('frequency_02');
                        frequency03.removeClass('frequency_03');
                        frequency04.removeClass('frequency_04');
                        frequency05.removeClass('frequency_05');
                    }
                    /*三剑合一 bin*/
                    if(tandemBox>=-500){
                        photOne.addClass('animte-photo-one');
                        photoTwo.addClass('animte-photo-two');
                    }
                    if(tandemBox>=700){
                        photOne.removeClass('animte-photo-one');
                        photoTwo.removeClass('animte-photo-two');
                    }
                }

            });


        });



    })();
    console.log('手机端');
}




/*
function total(nums){
    var ok= nums ? nums : 10;
    var num =ok,add,quantity=$('.text.quantity'),t=null;
    console.log(num+'px');
    add =function() {
        if(t){
            num++;
            quantity.val(num);
            console.log(num);
        }else {
            num--;
            if(num<=1){
                num=1;
            }
            quantity.val(num);
        }
    };
    return add;
}
var adds=total();
$('.text.quantity').blur(function () {
    var nums=$(this).val();
    total(nums);
});
$('.add').click(function () {
    adds(true);
});
$('.reduce').click(function () {
    adds(false);
});*/
