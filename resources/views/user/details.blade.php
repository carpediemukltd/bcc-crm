@extends('layout.appTheme')
@section('content')
<style type="text/css">
   /* Your Preloader css codes start here: */

/*
 * 2.0 -> Preloader
 * -----------------------------------------------
*/

#preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #fff;
  z-index: 9999;
}

#spinner {
  display: block;
  height: 110px;
  left: 50%;
  margin: -55px;
  position: relative;
  top: 50%;
  width: 110px;
}

#preloader #disable-preloader {
  display: block;
  position: absolute;
  right: 30px;
  bottom: 30px;
}

//*===== Preloader One =======*/

/*=======Markup=====

<div class="preloader-whirlpool">
	<div class="whirlpool"></div>
</div>

 */

.preloader-whirlpool {
  position: relative;
  .whirlpool {
    position: absolute;
    top: 50%;
    left: 50%;
    border: 1px solid rgb(204, 204, 204);
    border-left-color: rgb(0, 0, 0);
    border-radius: 974px;
    -o-border-radius: 974px;
    -ms-border-radius: 974px;
    -webkit-border-radius: 974px;
    -moz-border-radius: 974px;
    &::before, &::after {
      position: absolute;
      top: 50%;
      left: 50%;
      border: 1px solid rgb(204, 204, 204);
      border-left-color: rgb(0, 0, 0);
      border-radius: 974px;
      -o-border-radius: 974px;
      -ms-border-radius: 974px;
      -webkit-border-radius: 974px;
      -moz-border-radius: 974px;
    }
    margin: -24px 0 0 -24px;
    height: 49px;
    width: 49px;
    animation: cssload-rotate 1150ms linear infinite;
    -o-animation: cssload-rotate 1150ms linear infinite;
    -ms-animation: cssload-rotate 1150ms linear infinite;
    -webkit-animation: cssload-rotate 1150ms linear infinite;
    -moz-animation: cssload-rotate 1150ms linear infinite;
    &::before {
      content: "";
      margin: -22px 0 0 -22px;
      height: 43px;
      width: 43px;
      animation: cssload-rotate 1150ms linear infinite;
      -o-animation: cssload-rotate 1150ms linear infinite;
      -ms-animation: cssload-rotate 1150ms linear infinite;
      -webkit-animation: cssload-rotate 1150ms linear infinite;
      -moz-animation: cssload-rotate 1150ms linear infinite;
    }
    &::after {
      content: "";
      margin: -28px 0 0 -28px;
      height: 55px;
      width: 55px;
      animation: cssload-rotate 2300ms linear infinite;
      -o-animation: cssload-rotate 2300ms linear infinite;
      -ms-animation: cssload-rotate 2300ms linear infinite;
      -webkit-animation: cssload-rotate 2300ms linear infinite;
      -moz-animation: cssload-rotate 2300ms linear infinite;
    }
  }
}

@keyframes cssload-rotate {
  100% {
    transform: rotate(360deg);
  }
}


@-o-keyframes cssload-rotate {
  100% {
    -o-transform: rotate(360deg);
  }
}


@-ms-keyframes cssload-rotate {
  100% {
    -ms-transform: rotate(360deg);
  }
}


@-webkit-keyframes cssload-rotate {
  100% {
    -webkit-transform: rotate(360deg);
  }
}


@-moz-keyframes cssload-rotate {
  100% {
    -moz-transform: rotate(360deg);
  }
}


/*===== Preloader Two =======*/

/*=======Markup=====

<div class="preloader-floating-circles">
	<div class="f_circleG" id="frotateG_01"></div>
	<div class="f_circleG" id="frotateG_02"></div>
	<div class="f_circleG" id="frotateG_03"></div>
	<div class="f_circleG" id="frotateG_04"></div>
	<div class="f_circleG" id="frotateG_05"></div>
	<div class="f_circleG" id="frotateG_06"></div>
	<div class="f_circleG" id="frotateG_07"></div>
	<div class="f_circleG" id="frotateG_08"></div>
</div>

 */

.preloader-floating-circles {
  position: relative;
  width: 80px;
  height: 80px;
  margin: auto;
  transform: scale(0.6);
  -o-transform: scale(0.6);
  -ms-transform: scale(0.6);
  -webkit-transform: scale(0.6);
  -moz-transform: scale(0.6);
  .f_circleG {
    position: absolute;
    background-color: rgb(255, 255, 255);
    height: 14px;
    width: 14px;
    border-radius: 7px;
    -o-border-radius: 7px;
    -ms-border-radius: 7px;
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    animation-name: f_fadeG;
    -o-animation-name: f_fadeG;
    -ms-animation-name: f_fadeG;
    -webkit-animation-name: f_fadeG;
    -moz-animation-name: f_fadeG;
    animation-duration: 0.672s;
    -o-animation-duration: 0.672s;
    -ms-animation-duration: 0.672s;
    -webkit-animation-duration: 0.672s;
    -moz-animation-duration: 0.672s;
    animation-iteration-count: infinite;
    -o-animation-iteration-count: infinite;
    -ms-animation-iteration-count: infinite;
    -webkit-animation-iteration-count: infinite;
    -moz-animation-iteration-count: infinite;
    animation-direction: normal;
    -o-animation-direction: normal;
    -ms-animation-direction: normal;
    -webkit-animation-direction: normal;
    -moz-animation-direction: normal;
  }
  #frotateG_01 {
    left: 0;
    top: 32px;
    animation-delay: 0.2495s;
    -o-animation-delay: 0.2495s;
    -ms-animation-delay: 0.2495s;
    -webkit-animation-delay: 0.2495s;
    -moz-animation-delay: 0.2495s;
  }
  #frotateG_02 {
    left: 9px;
    top: 9px;
    animation-delay: 0.336s;
    -o-animation-delay: 0.336s;
    -ms-animation-delay: 0.336s;
    -webkit-animation-delay: 0.336s;
    -moz-animation-delay: 0.336s;
  }
  #frotateG_03 {
    left: 32px;
    top: 0;
    animation-delay: 0.4225s;
    -o-animation-delay: 0.4225s;
    -ms-animation-delay: 0.4225s;
    -webkit-animation-delay: 0.4225s;
    -moz-animation-delay: 0.4225s;
  }
  #frotateG_04 {
    right: 9px;
    top: 9px;
    animation-delay: 0.509s;
    -o-animation-delay: 0.509s;
    -ms-animation-delay: 0.509s;
    -webkit-animation-delay: 0.509s;
    -moz-animation-delay: 0.509s;
  }
  #frotateG_05 {
    right: 0;
    top: 32px;
    animation-delay: 0.5955s;
    -o-animation-delay: 0.5955s;
    -ms-animation-delay: 0.5955s;
    -webkit-animation-delay: 0.5955s;
    -moz-animation-delay: 0.5955s;
  }
  #frotateG_06 {
    right: 9px;
    bottom: 9px;
    animation-delay: 0.672s;
    -o-animation-delay: 0.672s;
    -ms-animation-delay: 0.672s;
    -webkit-animation-delay: 0.672s;
    -moz-animation-delay: 0.672s;
  }
  #frotateG_07 {
    left: 32px;
    bottom: 0;
    animation-delay: 0.7585s;
    -o-animation-delay: 0.7585s;
    -ms-animation-delay: 0.7585s;
    -webkit-animation-delay: 0.7585s;
    -moz-animation-delay: 0.7585s;
  }
  #frotateG_08 {
    left: 9px;
    bottom: 9px;
    animation-delay: 0.845s;
    -o-animation-delay: 0.845s;
    -ms-animation-delay: 0.845s;
    -webkit-animation-delay: 0.845s;
    -moz-animation-delay: 0.845s;
  }
}

@keyframes f_fadeG {
  0% {
    background-color: rgb(0, 0, 0);
  }

  100% {
    background-color: rgb(255, 255, 255);
  }
}


@-o-keyframes f_fadeG {
  0% {
    background-color: rgb(0, 0, 0);
  }

  100% {
    background-color: rgb(255, 255, 255);
  }
}


@-ms-keyframes f_fadeG {
  0% {
    background-color: rgb(0, 0, 0);
  }

  100% {
    background-color: rgb(255, 255, 255);
  }
}


@-webkit-keyframes f_fadeG {
  0% {
    background-color: rgb(0, 0, 0);
  }

  100% {
    background-color: rgb(255, 255, 255);
  }
}


@-moz-keyframes f_fadeG {
  0% {
    background-color: rgb(0, 0, 0);
  }

  100% {
    background-color: rgb(255, 255, 255);
  }
}


/*===== Preloader Three =======*/

/*=======Markup=====

<div class="preloader-eight-spinning">
	<div class="cssload-lt"></div>
	<div class="cssload-rt"></div>
	<div class="cssload-lb"></div>
	<div class="cssload-rb"></div>
</div>

 */

.preloader-eight-spinning {
  width: 72px;
  margin: 0px auto;
  font-size: 0;
  position: relative;
  transform-origin: 50% 50%;
  -o-transform-origin: 50% 50%;
  -ms-transform-origin: 50% 50%;
  -webkit-transform-origin: 50% 50%;
  -moz-transform-origin: 50% 50%;
  animation: cssload-clockwise 6.9s linear infinite;
  -o-animation: cssload-clockwise 6.9s linear infinite;
  -ms-animation: cssload-clockwise 6.9s linear infinite;
  -webkit-animation: cssload-clockwise 6.9s linear infinite;
  -moz-animation: cssload-clockwise 6.9s linear infinite;
  &:before {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    width: 39px;
    height: 39px;
    border: 6px solid rgb(229, 229, 229);
    border-radius: 100%;
    -o-border-radius: 100%;
    -ms-border-radius: 100%;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
  }
  &:after {
    position: absolute;
    content: '';
    z-index: -1;
    top: 0;
    right: 0;
    width: 39px;
    height: 39px;
    border: 6px solid rgb(229, 229, 229);
    border-radius: 100%;
    -o-border-radius: 100%;
    -ms-border-radius: 100%;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
  }
  .cssload-lt, .cssload-rt, .cssload-lb, .cssload-rb {
    position: relative;
    display: inline-block;
    overflow: hidden;
    width: 39px;
    height: 19px;
    opacity: 1;
  }
  .cssload-lt:before, .cssload-rt:before, .cssload-lb:before, .cssload-rb:before {
    position: absolute;
    content: '';
    width: 39px;
    height: 39px;
    border-top: 6px solid rgb(87, 67, 87);
    border-right: 6px solid transparent;
    border-bottom: 6px solid transparent;
    border-left: 6px solid transparent;
    border-radius: 100%;
    -o-border-radius: 100%;
    -ms-border-radius: 100%;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -moz-box-sizing: border-box;
  }
  .cssload-lt {
    margin-right: -6px;
    animation: cssload-lt 2.3s linear -2300ms infinite;
    -o-animation: cssload-lt 2.3s linear -2300ms infinite;
    -ms-animation: cssload-lt 2.3s linear -2300ms infinite;
    -webkit-animation: cssload-lt 2.3s linear -2300ms infinite;
    -moz-animation: cssload-lt 2.3s linear -2300ms infinite;
    &:before {
      top: 0;
      left: 0;
      animation: cssload-not-clockwise 1.15s linear infinite;
      -o-animation: cssload-not-clockwise 1.15s linear infinite;
      -ms-animation: cssload-not-clockwise 1.15s linear infinite;
      -webkit-animation: cssload-not-clockwise 1.15s linear infinite;
      -moz-animation: cssload-not-clockwise 1.15s linear infinite;
    }
  }
  .cssload-rt {
    animation: cssload-lt 2.3s linear -1150ms infinite;
    -o-animation: cssload-lt 2.3s linear -1150ms infinite;
    -ms-animation: cssload-lt 2.3s linear -1150ms infinite;
    -webkit-animation: cssload-lt 2.3s linear -1150ms infinite;
    -moz-animation: cssload-lt 2.3s linear -1150ms infinite;
    &:before {
      top: 0;
      right: 0;
      animation: cssload-clockwise 1.15s linear infinite;
      -o-animation: cssload-clockwise 1.15s linear infinite;
      -ms-animation: cssload-clockwise 1.15s linear infinite;
      -webkit-animation: cssload-clockwise 1.15s linear infinite;
      -moz-animation: cssload-clockwise 1.15s linear infinite;
    }
  }
  .cssload-lb {
    margin-right: -6px;
    animation: cssload-lt 2.3s linear -1725ms infinite;
    -o-animation: cssload-lt 2.3s linear -1725ms infinite;
    -ms-animation: cssload-lt 2.3s linear -1725ms infinite;
    -webkit-animation: cssload-lt 2.3s linear -1725ms infinite;
    -moz-animation: cssload-lt 2.3s linear -1725ms infinite;
    &:before {
      bottom: 0;
      left: 0;
      animation: cssload-not-clockwise 1.15s linear infinite;
      -o-animation: cssload-not-clockwise 1.15s linear infinite;
      -ms-animation: cssload-not-clockwise 1.15s linear infinite;
      -webkit-animation: cssload-not-clockwise 1.15s linear infinite;
      -moz-animation: cssload-not-clockwise 1.15s linear infinite;
    }
  }
  .cssload-rb {
    animation: cssload-lt 2.3s linear -575ms infinite;
    -o-animation: cssload-lt 2.3s linear -575ms infinite;
    -ms-animation: cssload-lt 2.3s linear -575ms infinite;
    -webkit-animation: cssload-lt 2.3s linear -575ms infinite;
    -moz-animation: cssload-lt 2.3s linear -575ms infinite;
    &:before {
      bottom: 0;
      right: 0;
      animation: cssload-clockwise 1.15s linear infinite;
      -o-animation: cssload-clockwise 1.15s linear infinite;
      -ms-animation: cssload-clockwise 1.15s linear infinite;
      -webkit-animation: cssload-clockwise 1.15s linear infinite;
      -moz-animation: cssload-clockwise 1.15s linear infinite;
    }
  }
}

@keyframes cssload-clockwise {
  0% {
    transform: rotate(-45deg);
  }

  100% {
    transform: rotate(315deg);
  }
}


@-o-keyframes cssload-clockwise {
  0% {
    -o-transform: rotate(-45deg);
  }

  100% {
    -o-transform: rotate(315deg);
  }
}


@-ms-keyframes cssload-clockwise {
  0% {
    -ms-transform: rotate(-45deg);
  }

  100% {
    -ms-transform: rotate(315deg);
  }
}


@-webkit-keyframes cssload-clockwise {
  0% {
    -webkit-transform: rotate(-45deg);
  }

  100% {
    -webkit-transform: rotate(315deg);
  }
}


@-moz-keyframes cssload-clockwise {
  0% {
    -moz-transform: rotate(-45deg);
  }

  100% {
    -moz-transform: rotate(315deg);
  }
}


@keyframes cssload-not-clockwise {
  0% {
    transform: rotate(45deg);
  }

  100% {
    transform: rotate(-315deg);
  }
}


@-o-keyframes cssload-not-clockwise {
  0% {
    -o-transform: rotate(45deg);
  }

  100% {
    -o-transform: rotate(-315deg);
  }
}


@-ms-keyframes cssload-not-clockwise {
  0% {
    -ms-transform: rotate(45deg);
  }

  100% {
    -ms-transform: rotate(-315deg);
  }
}


@-webkit-keyframes cssload-not-clockwise {
  0% {
    -webkit-transform: rotate(45deg);
  }

  100% {
    -webkit-transform: rotate(-315deg);
  }
}


@-moz-keyframes cssload-not-clockwise {
  0% {
    -moz-transform: rotate(45deg);
  }

  100% {
    -moz-transform: rotate(-315deg);
  }
}


@keyframes cssload-lt {
  0% {
    opacity: 1;
  }

  25% {
    opacity: 1;
  }

  26% {
    opacity: 0;
  }

  75% {
    opacity: 0;
  }

  76% {
    opacity: 1;
  }

  100% {
    opacity: 1;
  }
}


@-o-keyframes cssload-lt {
  0% {
    opacity: 1;
  }

  25% {
    opacity: 1;
  }

  26% {
    opacity: 0;
  }

  75% {
    opacity: 0;
  }

  76% {
    opacity: 1;
  }

  100% {
    opacity: 1;
  }
}


@-ms-keyframes cssload-lt {
  0% {
    opacity: 1;
  }

  25% {
    opacity: 1;
  }

  26% {
    opacity: 0;
  }

  75% {
    opacity: 0;
  }

  76% {
    opacity: 1;
  }

  100% {
    opacity: 1;
  }
}


@-webkit-keyframes cssload-lt {
  0% {
    opacity: 1;
  }

  25% {
    opacity: 1;
  }

  26% {
    opacity: 0;
  }

  75% {
    opacity: 0;
  }

  76% {
    opacity: 1;
  }

  100% {
    opacity: 1;
  }
}


@-moz-keyframes cssload-lt {
  0% {
    opacity: 1;
  }

  25% {
    opacity: 1;
  }

  26% {
    opacity: 0;
  }

  75% {
    opacity: 0;
  }

  76% {
    opacity: 1;
  }

  100% {
    opacity: 1;
  }
}


/*===== Preloader Four =======*/

/*=======Markup=====

<div class="preloader-double-torus"></div>

 */

.preloader-double-torus {
  width: 49px;
  height: 49px;
  margin: 0 auto;
  border: 4px double;
  border-radius: 50%;
  border-color: transparent rgba(0, 0, 0, 0.9) rgba(0, 0, 0, 0.9);
  animation: cssload-spin 960ms infinite linear;
  -o-animation: cssload-spin 960ms infinite linear;
  -ms-animation: cssload-spin 960ms infinite linear;
  -webkit-animation: cssload-spin 960ms infinite linear;
  -moz-animation: cssload-spin 960ms infinite linear;
}

@keyframes cssload-spin {
  100% {
    transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


@-o-keyframes cssload-spin {
  100% {
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


@-ms-keyframes cssload-spin {
  100% {
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


@-webkit-keyframes cssload-spin {
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


@-moz-keyframes cssload-spin {
  100% {
    -moz-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


/*===== Preloader Five =======*/

/*=======Markup=====

<div class="preloader-tube-tunnel"></div>

 */

.preloader-tube-tunnel {
  width: 49px;
  height: 49px;
  margin: 0 auto;
  border: 4px solid;
  border-radius: 50%;
  border-color: rgb(0, 0, 0);
  animation: cssload-scale 1035ms infinite linear;
  -o-animation: cssload-scale 1035ms infinite linear;
  -ms-animation: cssload-scale 1035ms infinite linear;
  -webkit-animation: cssload-scale 1035ms infinite linear;
  -moz-animation: cssload-scale 1035ms infinite linear;
}

@keyframes cssload-scale {
  0% {
    transform: scale(0);
    transform: scale(0);
  }

  90% {
    transform: scale(0.7);
    transform: scale(0.7);
  }

  100% {
    transform: scale(1);
    transform: scale(1);
  }
}


@-o-keyframes cssload-scale {
  0% {
    -o-transform: scale(0);
    transform: scale(0);
  }

  90% {
    -o-transform: scale(0.7);
    transform: scale(0.7);
  }

  100% {
    -o-transform: scale(1);
    transform: scale(1);
  }
}


@-ms-keyframes cssload-scale {
  0% {
    -ms-transform: scale(0);
    transform: scale(0);
  }

  90% {
    -ms-transform: scale(0.7);
    transform: scale(0.7);
  }

  100% {
    -ms-transform: scale(1);
    transform: scale(1);
  }
}


@-webkit-keyframes cssload-scale {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
  }

  90% {
    -webkit-transform: scale(0.7);
    transform: scale(0.7);
  }

  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}


@-moz-keyframes cssload-scale {
  0% {
    -moz-transform: scale(0);
    transform: scale(0);
  }

  90% {
    -moz-transform: scale(0.7);
    transform: scale(0.7);
  }

  100% {
    -moz-transform: scale(1);
    transform: scale(1);
  }
}


/*===== Preloader Six =======*/

/*=======Markup=====

<div class="preloader-speeding-wheel"></div>

 */

.preloader-speeding-wheel {
  width: 49px;
  height: 49px;
  margin: 0 auto;
  border: 3px solid rgb(0, 0, 0);
  border-radius: 50%;
  border-left-color: transparent;
  border-right-color: transparent;
  animation: cssload-spin 575ms infinite linear;
  -o-animation: cssload-spin 575ms infinite linear;
  -ms-animation: cssload-spin 575ms infinite linear;
  -webkit-animation: cssload-spin 575ms infinite linear;
  -moz-animation: cssload-spin 575ms infinite linear;
}

@keyframes cssload-spin {
  100% {
    transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


@-o-keyframes cssload-spin {
  100% {
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


@-ms-keyframes cssload-spin {
  100% {
    -ms-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


@-webkit-keyframes cssload-spin {
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


@-moz-keyframes cssload-spin {
  100% {
    -moz-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


/*===== Preloader Seven =======*/

/*=======Markup=====

<div class="preloader-loading-wrapper">
	<div class="cssload-loading"><i></i><i></i></div>
</div>

 */

.preloader-loading-wrapper {
  display: block;
  margin: 0px auto;
  width: 97px;
  .cssload-loading i {
    width: 49px;
    height: 49px;
    display: inline-block;
    background: rgb(255, 89, 84);
    border-radius: 50%;
    &:nth-child(1) {
      animation: cssload-loading-ani1 1.15s ease-in-out infinite;
      -o-animation: cssload-loading-ani1 1.15s ease-in-out infinite;
      -ms-animation: cssload-loading-ani1 1.15s ease-in-out infinite;
      -webkit-animation: cssload-loading-ani1 1.15s ease-in-out infinite;
      -moz-animation: cssload-loading-ani1 1.15s ease-in-out infinite;
    }
    &:nth-child(2) {
      background: rgb(0, 168, 206);
      margin-left: -10px;
      animation: cssload-loading-ani1 1.15s ease-in-out 0.58s infinite;
      -o-animation: cssload-loading-ani1 1.15s ease-in-out 0.58s infinite;
      -ms-animation: cssload-loading-ani1 1.15s ease-in-out 0.58s infinite;
      -webkit-animation: cssload-loading-ani1 1.15s ease-in-out 0.58s infinite;
      -moz-animation: cssload-loading-ani1 1.15s ease-in-out 0.58s infinite;
    }
  }
}

@keyframes cssload-loading-ani1 {
  70% {
    transform: scale(0.5);
  }
}


@-o-keyframes cssload-loading-ani1 {
  70% {
    -o-transform: scale(0.5);
  }
}


@-ms-keyframes cssload-loading-ani1 {
  70% {
    -ms-transform: scale(0.5);
  }
}


@-webkit-keyframes cssload-loading-ani1 {
  70% {
    -webkit-transform: scale(0.5);
  }
}


@-moz-keyframes cssload-loading-ani1 {
  70% {
    -moz-transform: scale(0.5);
  }
}


/*===== Preloader Eight =======*/

/*=======Markup=====

<div class="preloader-dot-loading">
	<div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
</div>

 */

.preloader-dot-loading {
  display: block;
  margin: 0px auto;
  width: 97px;
  .cssload-loading i {
    width: 19px;
    height: 19px;
    display: inline-block;
    border-radius: 50%;
    background: rgb(42, 43, 38);
    &:first-child {
      opacity: 0;
      animation: cssload-loading-ani2 0.58s linear infinite;
      -o-animation: cssload-loading-ani2 0.58s linear infinite;
      -ms-animation: cssload-loading-ani2 0.58s linear infinite;
      -webkit-animation: cssload-loading-ani2 0.58s linear infinite;
      -moz-animation: cssload-loading-ani2 0.58s linear infinite;
      transform: translate(-19px);
      -o-transform: translate(-19px);
      -ms-transform: translate(-19px);
      -webkit-transform: translate(-19px);
      -moz-transform: translate(-19px);
    }
    &:nth-child(2), &:nth-child(3) {
      animation: cssload-loading-ani3 0.58s linear infinite;
      -o-animation: cssload-loading-ani3 0.58s linear infinite;
      -ms-animation: cssload-loading-ani3 0.58s linear infinite;
      -webkit-animation: cssload-loading-ani3 0.58s linear infinite;
      -moz-animation: cssload-loading-ani3 0.58s linear infinite;
    }
    &:last-child {
      animation: cssload-loading-ani1 0.58s linear infinite;
      -o-animation: cssload-loading-ani1 0.58s linear infinite;
      -ms-animation: cssload-loading-ani1 0.58s linear infinite;
      -webkit-animation: cssload-loading-ani1 0.58s linear infinite;
      -moz-animation: cssload-loading-ani1 0.58s linear infinite;
    }
  }
}

@keyframes cssload-loading-ani1 {
  100% {
    transform: translate(39px);
    opacity: 0;
  }
}


@-o-keyframes cssload-loading-ani1 {
  100% {
    -o-transform: translate(39px);
    opacity: 0;
  }
}


@-ms-keyframes cssload-loading-ani1 {
  100% {
    -ms-transform: translate(39px);
    opacity: 0;
  }
}


@-webkit-keyframes cssload-loading-ani1 {
  100% {
    -webkit-transform: translate(39px);
    opacity: 0;
  }
}


@-moz-keyframes cssload-loading-ani1 {
  100% {
    -moz-transform: translate(39px);
    opacity: 0;
  }
}


@keyframes cssload-loading-ani2 {
  100% {
    transform: translate(19px);
    opacity: 1;
  }
}


@-o-keyframes cssload-loading-ani2 {
  100% {
    -o-transform: translate(19px);
    opacity: 1;
  }
}


@-ms-keyframes cssload-loading-ani2 {
  100% {
    -ms-transform: translate(19px);
    opacity: 1;
  }
}


@-webkit-keyframes cssload-loading-ani2 {
  100% {
    -webkit-transform: translate(19px);
    opacity: 1;
  }
}


@-moz-keyframes cssload-loading-ani2 {
  100% {
    -moz-transform: translate(19px);
    opacity: 1;
  }
}


@keyframes cssload-loading-ani3 {
  100% {
    transform: translate(19px);
  }
}


@-o-keyframes cssload-loading-ani3 {
  100% {
    -o-transform: translate(19px);
  }
}


@-ms-keyframes cssload-loading-ani3 {
  100% {
    -ms-transform: translate(19px);
  }
}


@-webkit-keyframes cssload-loading-ani3 {
  100% {
    -webkit-transform: translate(19px);
  }
}


@-moz-keyframes cssload-loading-ani3 {
  100% {
    -moz-transform: translate(19px);
  }
}


/*===== Preloader Nine =======*/

/*=======Markup=====

<div class="preloader-fountainTextG">
	<div id="fountainTextG_1" class="fountainTextG">L</div>
	<div id="fountainTextG_2" class="fountainTextG">o</div>
	<div id="fountainTextG_3" class="fountainTextG">a</div>
	<div id="fountainTextG_4" class="fountainTextG">d</div>
	<div id="fountainTextG_5" class="fountainTextG">i</div>
	<div id="fountainTextG_6" class="fountainTextG">n</div>
	<div id="fountainTextG_7" class="fountainTextG">g</div>
</div>

*/

.preloader-fountainTextG {
  width: 300px;
  margin: auto;
  .fountainTextG {
    color: rgb(0, 0, 0);
    font-family: Arial;
    font-size: 31px;
    text-decoration: none;
    font-weight: normal;
    font-style: normal;
    float: left;
    animation-name: bounce_fountainTextG;
    -o-animation-name: bounce_fountainTextG;
    -ms-animation-name: bounce_fountainTextG;
    -webkit-animation-name: bounce_fountainTextG;
    -moz-animation-name: bounce_fountainTextG;
    animation-duration: 2.09s;
    -o-animation-duration: 2.09s;
    -ms-animation-duration: 2.09s;
    -webkit-animation-duration: 2.09s;
    -moz-animation-duration: 2.09s;
    animation-iteration-count: infinite;
    -o-animation-iteration-count: infinite;
    -ms-animation-iteration-count: infinite;
    -webkit-animation-iteration-count: infinite;
    -moz-animation-iteration-count: infinite;
    animation-direction: normal;
    -o-animation-direction: normal;
    -ms-animation-direction: normal;
    -webkit-animation-direction: normal;
    -moz-animation-direction: normal;
    transform: scale(0.5);
    -o-transform: scale(0.5);
    -ms-transform: scale(0.5);
    -webkit-transform: scale(0.5);
    -moz-transform: scale(0.5);
  }
  #fountainTextG_1 {
    animation-delay: 0.75s;
    -o-animation-delay: 0.75s;
    -ms-animation-delay: 0.75s;
    -webkit-animation-delay: 0.75s;
    -moz-animation-delay: 0.75s;
  }
  #fountainTextG_2 {
    animation-delay: 0.9s;
    -o-animation-delay: 0.9s;
    -ms-animation-delay: 0.9s;
    -webkit-animation-delay: 0.9s;
    -moz-animation-delay: 0.9s;
  }
  #fountainTextG_3 {
    animation-delay: 1.05s;
    -o-animation-delay: 1.05s;
    -ms-animation-delay: 1.05s;
    -webkit-animation-delay: 1.05s;
    -moz-animation-delay: 1.05s;
  }
  #fountainTextG_4 {
    animation-delay: 1.2s;
    -o-animation-delay: 1.2s;
    -ms-animation-delay: 1.2s;
    -webkit-animation-delay: 1.2s;
    -moz-animation-delay: 1.2s;
  }
  #fountainTextG_5 {
    animation-delay: 1.35s;
    -o-animation-delay: 1.35s;
    -ms-animation-delay: 1.35s;
    -webkit-animation-delay: 1.35s;
    -moz-animation-delay: 1.35s;
  }
  #fountainTextG_6 {
    animation-delay: 1.5s;
    -o-animation-delay: 1.5s;
    -ms-animation-delay: 1.5s;
    -webkit-animation-delay: 1.5s;
    -moz-animation-delay: 1.5s;
  }
  #fountainTextG_7 {
    animation-delay: 1.64s;
    -o-animation-delay: 1.64s;
    -ms-animation-delay: 1.64s;
    -webkit-animation-delay: 1.64s;
    -moz-animation-delay: 1.64s;
  }
}

@keyframes bounce_fountainTextG {
  0% {
    transform: scale(1);
    color: rgb(0, 0, 0);
  }

  100% {
    transform: scale(0.5);
    color: rgb(255, 255, 255);
  }
}


@-o-keyframes bounce_fountainTextG {
  0% {
    -o-transform: scale(1);
    color: rgb(0, 0, 0);
  }

  100% {
    -o-transform: scale(0.5);
    color: rgb(255, 255, 255);
  }
}


@-ms-keyframes bounce_fountainTextG {
  0% {
    -ms-transform: scale(1);
    color: rgb(0, 0, 0);
  }

  100% {
    -ms-transform: scale(0.5);
    color: rgb(255, 255, 255);
  }
}


@-webkit-keyframes bounce_fountainTextG {
  0% {
    -webkit-transform: scale(1);
    color: rgb(0, 0, 0);
  }

  100% {
    -webkit-transform: scale(0.5);
    color: rgb(255, 255, 255);
  }
}


@-moz-keyframes bounce_fountainTextG {
  0% {
    -moz-transform: scale(1);
    color: rgb(0, 0, 0);
  }

  100% {
    -moz-transform: scale(0.5);
    color: rgb(255, 255, 255);
  }
}


/*===== Preloader Ten =======*/

/*=======Markup=====

<div class="preloader-circle-loading-wrapper">
	<div class="cssload-loader"></div>
</div>

 */

.preloader-circle-loading-wrapper {
  margin: 0px auto;
  display: block;
  width: 97px;
  .cssload-loader {
    width: 49px;
    height: 49px;
    border-radius: 50%;
    margin: 0;
    display: inline-block;
    position: relative;
    vertical-align: middle;
    width: 49px;
    height: 49px;
    border-radius: 50%;
    margin: 0;
    display: inline-block;
    position: relative;
    vertical-align: middle;
    background-color: rgb(211, 211, 211);
    animation: 1.15s infinite ease-in-out;
    -o-animation: 1.15s infinite ease-in-out;
    -ms-animation: 1.15s infinite ease-in-out;
    -webkit-animation: 1.15s infinite ease-in-out;
    -moz-animation: 1.15s infinite ease-in-out;
    &:before, &:after {
      animation: 1.15s infinite ease-in-out;
      -o-animation: 1.15s infinite ease-in-out;
      -ms-animation: 1.15s infinite ease-in-out;
      -webkit-animation: 1.15s infinite ease-in-out;
      -moz-animation: 1.15s infinite ease-in-out;
    }
    &:before, &:after {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      position: absolute;
      top: 0;
      left: 0;
    }
    &:before, &:after {
      content: "";
    }
    &:before {
      content: '';
      border: 10px solid white;
      top: 0px;
      left: 0px;
      animation-name: cssload-animation;
      -o-animation-name: cssload-animation;
      -ms-animation-name: cssload-animation;
      -webkit-animation-name: cssload-animation;
      -moz-animation-name: cssload-animation;
    }
  }
}

@keyframes cssload-animation {
  0% {
    transform: scale(0);
  }

  100% {
    transform: scale(1);
  }
}


@-o-keyframes cssload-animation {
  0% {
    -o-transform: scale(0);
  }

  100% {
    -o-transform: scale(1);
  }
}


@-ms-keyframes cssload-animation {
  0% {
    -ms-transform: scale(0);
  }

  100% {
    -ms-transform: scale(1);
  }
}


@-webkit-keyframes cssload-animation {
  0% {
    -webkit-transform: scale(0);
  }

  100% {
    -webkit-transform: scale(1);
  }
}


@-moz-keyframes cssload-animation {
  0% {
    -moz-transform: scale(0);
  }

  100% {
    -moz-transform: scale(1);
  }
}


/*===== Preloader Eleven =======*/

/*=======Markup=====

<div class="preloader-dot-circle-rotator"></div>

*/

.preloader-dot-circle-rotator {
  position: relative;
  width: 12px;
  height: 12px;
  left: 46%;
  left: calc(50% - 6px);
  left: -o-calc(50% - 6px);
  left: -ms-calc(50% - 6px);
  left: -webkit-calc(50% - 6px);
  left: -moz-calc(50% - 6px);
  border-radius: 12px;
  background-color: rgb(0, 0, 0);
  transform-origin: 50% 50%;
  -o-transform-origin: 50% 50%;
  -ms-transform-origin: 50% 50%;
  -webkit-transform-origin: 50% 50%;
  -moz-transform-origin: 50% 50%;
  animation: cssload-loader 1.15s ease-in-out infinite;
  -o-animation: cssload-loader 1.15s ease-in-out infinite;
  -ms-animation: cssload-loader 1.15s ease-in-out infinite;
  -webkit-animation: cssload-loader 1.15s ease-in-out infinite;
  -moz-animation: cssload-loader 1.15s ease-in-out infinite;
  &:before {
    content: "";
    position: absolute;
    background-color: rgb(0, 0, 0);
    top: 0px;
    left: -24px;
    height: 12px;
    width: 12px;
    border-radius: 12px;
  }
  &:after {
    content: "";
    position: absolute;
    background-color: rgb(0, 0, 0);
    top: 0px;
    left: 24px;
    height: 12px;
    width: 12px;
    border-radius: 12px;
  }
}

@keyframes cssload-loader {
  0% {
    transform: rotate(0deg);
  }

  50% {
    transform: rotate(180deg);
  }

  100% {
    transform: rotate(180deg);
  }
}


@-o-keyframes cssload-loader {
  0% {
    -o-transform: rotate(0deg);
  }

  50% {
    -o-transform: rotate(180deg);
  }

  100% {
    -o-transform: rotate(180deg);
  }
}


@-ms-keyframes cssload-loader {
  0% {
    -ms-transform: rotate(0deg);
  }

  50% {
    -ms-transform: rotate(180deg);
  }

  100% {
    -ms-transform: rotate(180deg);
  }
}


@-webkit-keyframes cssload-loader {
  0% {
    -webkit-transform: rotate(0deg);
  }

  50% {
    -webkit-transform: rotate(180deg);
  }

  100% {
    -webkit-transform: rotate(180deg);
  }
}


@-moz-keyframes cssload-loader {
  0% {
    -moz-transform: rotate(0deg);
  }

  50% {
    -moz-transform: rotate(180deg);
  }

  100% {
    -moz-transform: rotate(180deg);
  }
}


/*===== Preloader Twelve =======*/

/*=======Markup=====

<div class="preloader-bubblingG">
	<span id="bubblingG_1">
	</span>
	<span id="bubblingG_2">
	</span>
	<span id="bubblingG_3">
	</span>
</div>
*/

.preloader-bubblingG {
  text-align: center;
  width: 78px;
  height: 49px;
  margin: auto;
  span {
    display: inline-block;
    vertical-align: middle;
    width: 10px;
    height: 10px;
    margin: 24px auto;
    background: rgb(0, 0, 0);
    border-radius: 49px;
    -o-border-radius: 49px;
    -ms-border-radius: 49px;
    -webkit-border-radius: 49px;
    -moz-border-radius: 49px;
    animation: bubblingG 1.5s infinite alternate;
    -o-animation: bubblingG 1.5s infinite alternate;
    -ms-animation: bubblingG 1.5s infinite alternate;
    -webkit-animation: bubblingG 1.5s infinite alternate;
    -moz-animation: bubblingG 1.5s infinite alternate;
  }
  #bubblingG_1 {
    animation-delay: 0s;
    -o-animation-delay: 0s;
    -ms-animation-delay: 0s;
    -webkit-animation-delay: 0s;
    -moz-animation-delay: 0s;
  }
  #bubblingG_2 {
    animation-delay: 0.45s;
    -o-animation-delay: 0.45s;
    -ms-animation-delay: 0.45s;
    -webkit-animation-delay: 0.45s;
    -moz-animation-delay: 0.45s;
  }
  #bubblingG_3 {
    animation-delay: 0.9s;
    -o-animation-delay: 0.9s;
    -ms-animation-delay: 0.9s;
    -webkit-animation-delay: 0.9s;
    -moz-animation-delay: 0.9s;
  }
}

@keyframes bubblingG {
  0% {
    width: 10px;
    height: 10px;
    background-color: rgb(0, 0, 0);
    transform: translateY(0);
  }

  100% {
    width: 23px;
    height: 23px;
    background-color: rgb(255, 255, 255);
    transform: translateY(-20px);
  }
}


@-o-keyframes bubblingG {
  0% {
    width: 10px;
    height: 10px;
    background-color: rgb(0, 0, 0);
    -o-transform: translateY(0);
  }

  100% {
    width: 23px;
    height: 23px;
    background-color: rgb(255, 255, 255);
    -o-transform: translateY(-20px);
  }
}


@-ms-keyframes bubblingG {
  0% {
    width: 10px;
    height: 10px;
    background-color: rgb(0, 0, 0);
    -ms-transform: translateY(0);
  }

  100% {
    width: 23px;
    height: 23px;
    background-color: rgb(255, 255, 255);
    -ms-transform: translateY(-20px);
  }
}


@-webkit-keyframes bubblingG {
  0% {
    width: 10px;
    height: 10px;
    background-color: rgb(0, 0, 0);
    -webkit-transform: translateY(0);
  }

  100% {
    width: 23px;
    height: 23px;
    background-color: rgb(255, 255, 255);
    -webkit-transform: translateY(-20px);
  }
}


@-moz-keyframes bubblingG {
  0% {
    width: 10px;
    height: 10px;
    background-color: rgb(0, 0, 0);
    -moz-transform: translateY(0);
  }

  100% {
    width: 23px;
    height: 23px;
    background-color: rgb(255, 255, 255);
    -moz-transform: translateY(-20px);
  }
}


/*===== Preloader Thirteen =======*/

/*=======Markup=====

<div class="preloader-coffee"></div>
*/

.preloader-coffee {
  text-align: left;
  height: 49px;
  width: 39px;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
  position: absolute;
  left: 50%;
  z-index: 999;
  background: linear-gradient(to bottom left, rgb(247, 148, 30), rgb(194, 108, 7));
  background: -o-linear-gradient(to bottom left, rgb(247, 148, 30), rgb(194, 108, 7));
  background: -ms-linear-gradient(to bottom left, rgb(247, 148, 30), rgb(194, 108, 7));
  background: -webkit-linear-gradient(to bottom left, rgb(247, 148, 30), rgb(194, 108, 7));
  background: -moz-linear-gradient(to bottom left, rgb(247, 148, 30), rgb(194, 108, 7));
  &:before {
    position: absolute;
    content: "";
    right: -15px;
    top: 5px;
    height: 24px;
    width: 10px;
    background: transparent;
    border: 5px solid rgb(247, 148, 30);
    border-left: 5px solid transparent;
    border-bottom: 5px solid rgb(231, 129, 8);
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    z-index: 1;
  }
  &:after {
    position: absolute;
    content: "";
    width: 5px;
    height: 29px;
    background: rgb(225, 225, 225);
    border-radius: 4px;
    top: -29px;
    box-shadow: 34px 0px 0 rgb(225, 225, 225), 17.5px -15px 0 rgb(225, 225, 225);
    opacity: 1;
    animation: cssload-steam 3.45s ease infinite;
    -o-animation: cssload-steam 3.45s ease infinite;
    -ms-animation: cssload-steam 3.45s ease infinite;
    -webkit-animation: cssload-steam 3.45s ease infinite;
    -moz-animation: cssload-steam 3.45s ease infinite;
  }
}

@keyframes cssload-steam {
  100% {
    top: -39px;
    background: rgb(238, 238, 238);
    box-shadow: 34px 0px 0 rgb(238, 238, 238), 17.5px -15px 0 rgb(238, 238, 238);
    opacity: 0.25;
  }
}


@-o-keyframes cssload-steam {
  100% {
    top: -39px;
    background: rgb(238, 238, 238);
    box-shadow: 34px 0px 0 rgb(238, 238, 238), 17.5px -15px 0 rgb(238, 238, 238);
    opacity: 0.25;
  }
}


@-ms-keyframes cssload-steam {
  100% {
    top: -39px;
    background: rgb(238, 238, 238);
    box-shadow: 34px 0px 0 rgb(238, 238, 238), 17.5px -15px 0 rgb(238, 238, 238);
    opacity: 0.25;
  }
}


@-webkit-keyframes cssload-steam {
  100% {
    top: -39px;
    background: rgb(238, 238, 238);
    box-shadow: 34px 0px 0 rgb(238, 238, 238), 17.5px -15px 0 rgb(238, 238, 238);
    opacity: 0.25;
  }
}


@-moz-keyframes cssload-steam {
  100% {
    top: -39px;
    background: rgb(238, 238, 238);
    box-shadow: 34px 0px 0 rgb(238, 238, 238), 17.5px -15px 0 rgb(238, 238, 238);
    opacity: 0.25;
  }
}


/*===== Preloader Fourteen =======*/

/*=======Markup=====

<div class="preloader-orbit-loading">
	<div class="cssload-inner cssload-one"></div>
	<div class="cssload-inner cssload-two"></div>
	<div class="cssload-inner cssload-three"></div>
</div>
*/

.preloader-orbit-loading {
  position: relative;
  left: calc(50% - 31px);
  width: 62px;
  height: 62px;
  border-radius: 50%;
  -o-border-radius: 50%;
  -ms-border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  perspective: 780px;
  .cssload-inner {
    position: absolute;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    &.cssload-one {
      left: 0%;
      top: 0%;
      animation: cssload-rotate-one 1.15s linear infinite;
      -o-animation: cssload-rotate-one 1.15s linear infinite;
      -ms-animation: cssload-rotate-one 1.15s linear infinite;
      -webkit-animation: cssload-rotate-one 1.15s linear infinite;
      -moz-animation: cssload-rotate-one 1.15s linear infinite;
      border-bottom: 3px solid rgb(0, 0, 0);
    }
    &.cssload-two {
      right: 0%;
      top: 0%;
      animation: cssload-rotate-two 1.15s linear infinite;
      -o-animation: cssload-rotate-two 1.15s linear infinite;
      -ms-animation: cssload-rotate-two 1.15s linear infinite;
      -webkit-animation: cssload-rotate-two 1.15s linear infinite;
      -moz-animation: cssload-rotate-two 1.15s linear infinite;
      border-right: 3px solid rgb(0, 0, 0);
    }
    &.cssload-three {
      right: 0%;
      bottom: 0%;
      animation: cssload-rotate-three 1.15s linear infinite;
      -o-animation: cssload-rotate-three 1.15s linear infinite;
      -ms-animation: cssload-rotate-three 1.15s linear infinite;
      -webkit-animation: cssload-rotate-three 1.15s linear infinite;
      -moz-animation: cssload-rotate-three 1.15s linear infinite;
      border-top: 3px solid rgb(0, 0, 0);
    }
  }
}

@keyframes cssload-rotate-one {
  0% {
    transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
  }

  100% {
    transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
  }
}


@-o-keyframes cssload-rotate-one {
  0% {
    -o-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
  }

  100% {
    -o-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
  }
}


@-ms-keyframes cssload-rotate-one {
  0% {
    -ms-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
  }

  100% {
    -ms-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
  }
}


@-webkit-keyframes cssload-rotate-one {
  0% {
    -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
  }

  100% {
    -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
  }
}


@-moz-keyframes cssload-rotate-one {
  0% {
    -moz-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
  }

  100% {
    -moz-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
  }
}


@keyframes cssload-rotate-two {
  0% {
    transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
  }

  100% {
    transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
  }
}


@-o-keyframes cssload-rotate-two {
  0% {
    -o-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
  }

  100% {
    -o-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
  }
}


@-ms-keyframes cssload-rotate-two {
  0% {
    -ms-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
  }

  100% {
    -ms-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
  }
}


@-webkit-keyframes cssload-rotate-two {
  0% {
    -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
  }

  100% {
    -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
  }
}


@-moz-keyframes cssload-rotate-two {
  0% {
    -moz-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
  }

  100% {
    -moz-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
  }
}


@keyframes cssload-rotate-three {
  0% {
    transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
  }

  100% {
    transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
  }
}


@-o-keyframes cssload-rotate-three {
  0% {
    -o-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
  }

  100% {
    -o-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
  }
}


@-ms-keyframes cssload-rotate-three {
  0% {
    -ms-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
  }

  100% {
    -ms-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
  }
}


@-webkit-keyframes cssload-rotate-three {
  0% {
    -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
  }

  100% {
    -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
  }
}


@-moz-keyframes cssload-rotate-three {
  0% {
    -moz-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
  }

  100% {
    -moz-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
  }
}


/*===== Preloader Fifteen =======*/

/*=======Markup=====

<div class="preloader-battery">
	<div class="cssload-liquid"></div>
</div>
*/

.preloader-battery {
  display: block;
  margin: 0px auto;
  position: relative;
  width: 2.25rem;
  height: 4.5rem;
  box-shadow: 0 0 0 0.2rem rgb(66, 92, 119);
  -o-box-shadow: 0 0 0 0.2rem rgb(66, 92, 119);
  -ms-box-shadow: 0 0 0 0.2rem rgb(66, 92, 119);
  -webkit-box-shadow: 0 0 0 0.2rem rgb(66, 92, 119);
  -moz-box-shadow: 0 0 0 0.2rem rgb(66, 92, 119);
  border-radius: 0.09rem;
  -o-border-radius: 0.09rem;
  -ms-border-radius: 0.09rem;
  -webkit-border-radius: 0.09rem;
  -moz-border-radius: 0.09rem;
  background: white;
  &:before {
    content: '';
    position: absolute;
    left: 0.5625rem;
    right: 0.5625rem;
    top: -0.3375rem;
    height: 0.3375rem;
    width: 1.125rem;
    background: rgb(66, 92, 119);
    border-radius: 0.18rem;
    -o-border-radius: 0.18rem;
    -ms-border-radius: 0.18rem;
    -webkit-border-radius: 0.18rem;
    -moz-border-radius: 0.18rem;
  }
  &:after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border-right: 2.25rem solid transparent;
    border-bottom: 4.05rem solid rgba(255, 255, 255, 0.32);
  }
  .cssload-liquid {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 2.25rem;
    background: rgb(113, 251, 133);
    animation: load 2.59s infinite;
    -o-animation: load 2.59s infinite;
    -ms-animation: load 2.59s infinite;
    -webkit-animation: load 2.59s infinite;
    -moz-animation: load 2.59s infinite;
    &:after, &:before {
      content: '';
      position: absolute;
      top: -0.5rem;
      height: 1.125rem;
      width: 1.4625rem;
      background: rgb(113, 251, 133);
      opacity: 0;
      border-radius: 50%;
      -o-border-radius: 50%;
      -ms-border-radius: 50%;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
    }
    &:after {
      right: 0;
      animation: cssload-liquid-1 2.59s infinite;
      -o-animation: cssload-liquid-1 2.59s infinite;
      -ms-animation: cssload-liquid-1 2.59s infinite;
      -webkit-animation: cssload-liquid-1 2.59s infinite;
      -moz-animation: cssload-liquid-1 2.59s infinite;
    }
    &:before {
      left: 0;
      animation: cssload-liquid-2 2.59s infinite;
      -o-animation: cssload-liquid-2 2.59s infinite;
      -ms-animation: cssload-liquid-2 2.59s infinite;
      -webkit-animation: cssload-liquid-2 2.59s infinite;
      -moz-animation: cssload-liquid-2 2.59s infinite;
    }
  }
}

@keyframes load {
  0% {
    top: 4.5rem;
  }

  70% {
    top: 1.125rem;
  }

  90% {
    top: 0;
  }

  95% {
    top: 0;
  }

  100% {
    top: 4.5rem;
  }
}


@-o-keyframes load {
  0% {
    top: 4.5rem;
  }

  70% {
    top: 1.125rem;
  }

  90% {
    top: 0;
  }

  95% {
    top: 0;
  }

  100% {
    top: 4.5rem;
  }
}


@-ms-keyframes load {
  0% {
    top: 4.5rem;
  }

  70% {
    top: 1.125rem;
  }

  90% {
    top: 0;
  }

  95% {
    top: 0;
  }

  100% {
    top: 4.5rem;
  }
}


@-webkit-keyframes load {
  0% {
    top: 4.5rem;
  }

  70% {
    top: 1.125rem;
  }

  90% {
    top: 0;
  }

  95% {
    top: 0;
  }

  100% {
    top: 4.5rem;
  }
}


@-moz-keyframes load {
  0% {
    top: 4.5rem;
  }

  70% {
    top: 1.125rem;
  }

  90% {
    top: 0;
  }

  95% {
    top: 0;
  }

  100% {
    top: 4.5rem;
  }
}


@keyframes cssload-liquid-1 {
  0% {
    height: 0;
    opacity: 0;
    top: -0.5rem;
  }

  22% {
    height: 0.28125rem;
    top: 0.375rem;
    opacity: 1;
  }

  25% {
    top: -0.25rem;
  }

  35% {
    height: 1.125rem;
    top: -0.5rem;
  }

  55% {
    height: 0.28125rem;
    top: -0.125rem;
  }

  60% {
    height: 0.61875rem;
    opacity: 1;
    top: -0.275rem;
  }

  96% {
    height: 0.84375rem;
    opacity: 0;
    top: 0.5rem;
  }

  100% {
    height: 0;
    opacity: 0;
  }
}


@-o-keyframes cssload-liquid-1 {
  0% {
    height: 0;
    opacity: 0;
    top: -0.5rem;
  }

  22% {
    height: 0.28125rem;
    top: 0.375rem;
    opacity: 1;
  }

  25% {
    top: -0.25rem;
  }

  35% {
    height: 1.125rem;
    top: -0.5rem;
  }

  55% {
    height: 0.28125rem;
    top: -0.125rem;
  }

  60% {
    height: 0.61875rem;
    opacity: 1;
    top: -0.275rem;
  }

  96% {
    height: 0.84375rem;
    opacity: 0;
    top: 0.5rem;
  }

  100% {
    height: 0;
    opacity: 0;
  }
}


@-ms-keyframes cssload-liquid-1 {
  0% {
    height: 0;
    opacity: 0;
    top: -0.5rem;
  }

  22% {
    height: 0.28125rem;
    top: 0.375rem;
    opacity: 1;
  }

  25% {
    top: -0.25rem;
  }

  35% {
    height: 1.125rem;
    top: -0.5rem;
  }

  55% {
    height: 0.28125rem;
    top: -0.125rem;
  }

  60% {
    height: 0.61875rem;
    opacity: 1;
    top: -0.275rem;
  }

  96% {
    height: 0.84375rem;
    opacity: 0;
    top: 0.5rem;
  }

  100% {
    height: 0;
    opacity: 0;
  }
}


@-webkit-keyframes cssload-liquid-1 {
  0% {
    height: 0;
    opacity: 0;
    top: -0.5rem;
  }

  22% {
    height: 0.28125rem;
    top: 0.375rem;
    opacity: 1;
  }

  25% {
    top: -0.25rem;
  }

  35% {
    height: 1.125rem;
    top: -0.5rem;
  }

  55% {
    height: 0.28125rem;
    top: -0.125rem;
  }

  60% {
    height: 0.61875rem;
    opacity: 1;
    top: -0.275rem;
  }

  96% {
    height: 0.84375rem;
    opacity: 0;
    top: 0.5rem;
  }

  100% {
    height: 0;
    opacity: 0;
  }
}


@-moz-keyframes cssload-liquid-1 {
  0% {
    height: 0;
    opacity: 0;
    top: -0.5rem;
  }

  22% {
    height: 0.28125rem;
    top: 0.375rem;
    opacity: 1;
  }

  25% {
    top: -0.25rem;
  }

  35% {
    height: 1.125rem;
    top: -0.5rem;
  }

  55% {
    height: 0.28125rem;
    top: -0.125rem;
  }

  60% {
    height: 0.61875rem;
    opacity: 1;
    top: -0.275rem;
  }

  96% {
    height: 0.84375rem;
    opacity: 0;
    top: 0.5rem;
  }

  100% {
    height: 0;
    opacity: 0;
  }
}


@keyframes cssload-liquid-2 {
  0% {
    height: 0;
    opacity: 0;
    top: -0.5rem;
  }

  17.5% {
    height: 0.28125rem;
    top: 0.2rem;
    opacity: 1;
  }

  20% {
    top: -0.25rem;
  }

  25% {
    height: 1.40625rem;
    top: -0.625rem;
  }

  45% {
    height: 0.28125rem;
    top: -0.125rem;
  }

  60% {
    height: 1.40625rem;
    opacity: 1;
    top: -0.5rem;
  }

  96% {
    height: 0.84375rem;
    opacity: 0;
    top: 0.5rem;
  }

  100% {
    height: 0;
    opacity: 0;
  }
}


@-o-keyframes cssload-liquid-2 {
  0% {
    height: 0;
    opacity: 0;
    top: -0.5rem;
  }

  17.5% {
    height: 0.28125rem;
    top: 0.2rem;
    opacity: 1;
  }

  20% {
    top: -0.25rem;
  }

  25% {
    height: 1.40625rem;
    top: -0.625rem;
  }

  45% {
    height: 0.28125rem;
    top: -0.125rem;
  }

  60% {
    height: 1.40625rem;
    opacity: 1;
    top: -0.5rem;
  }

  96% {
    height: 0.84375rem;
    opacity: 0;
    top: 0.5rem;
  }

  100% {
    height: 0;
    opacity: 0;
  }
}


@-ms-keyframes cssload-liquid-2 {
  0% {
    height: 0;
    opacity: 0;
    top: -0.5rem;
  }

  17.5% {
    height: 0.28125rem;
    top: 0.2rem;
    opacity: 1;
  }

  20% {
    top: -0.25rem;
  }

  25% {
    height: 1.40625rem;
    top: -0.625rem;
  }

  45% {
    height: 0.28125rem;
    top: -0.125rem;
  }

  60% {
    height: 1.40625rem;
    opacity: 1;
    top: -0.5rem;
  }

  96% {
    height: 0.84375rem;
    opacity: 0;
    top: 0.5rem;
  }

  100% {
    height: 0;
    opacity: 0;
  }
}


@-webkit-keyframes cssload-liquid-2 {
  0% {
    height: 0;
    opacity: 0;
    top: -0.5rem;
  }

  17.5% {
    height: 0.28125rem;
    top: 0.2rem;
    opacity: 1;
  }

  20% {
    top: -0.25rem;
  }

  25% {
    height: 1.40625rem;
    top: -0.625rem;
  }

  45% {
    height: 0.28125rem;
    top: -0.125rem;
  }

  60% {
    height: 1.40625rem;
    opacity: 1;
    top: -0.5rem;
  }

  96% {
    height: 0.84375rem;
    opacity: 0;
    top: 0.5rem;
  }

  100% {
    height: 0;
    opacity: 0;
  }
}


@-moz-keyframes cssload-liquid-2 {
  0% {
    height: 0;
    opacity: 0;
    top: -0.5rem;
  }

  17.5% {
    height: 0.28125rem;
    top: 0.2rem;
    opacity: 1;
  }

  20% {
    top: -0.25rem;
  }

  25% {
    height: 1.40625rem;
    top: -0.625rem;
  }

  45% {
    height: 0.28125rem;
    top: -0.125rem;
  }

  60% {
    height: 1.40625rem;
    opacity: 1;
    top: -0.5rem;
  }

  96% {
    height: 0.84375rem;
    opacity: 0;
    top: 0.5rem;
  }

  100% {
    height: 0;
    opacity: 0;
  }
}


/*===== Preloader Sixteen =======*/

/*=======Markup=====

<div class="preloader-equalizer">
	<ul>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
*/

.preloader-equalizer {
  position: absolute;
  margin: 50px auto;
  left: 0;
  right: 0;
  width: 88px;
  ul {
    margin: 0;
    list-style: none;
    width: 88px;
    height: 63px;
    position: relative;
    padding: 0;
    height: 10px;
    li {
      position: absolute;
      width: 2px;
      height: 0;
      background-color: rgb(0, 0, 0);
      bottom: 0;
    }
  }
  li {
    &:nth-child(1) {
      left: 0;
      animation: cssload-sequence1 1.15s ease infinite 0;
      -o-animation: cssload-sequence1 1.15s ease infinite 0;
      -ms-animation: cssload-sequence1 1.15s ease infinite 0;
      -webkit-animation: cssload-sequence1 1.15s ease infinite 0;
      -moz-animation: cssload-sequence1 1.15s ease infinite 0;
    }
    &:nth-child(2) {
      left: 15px;
      animation: cssload-sequence2 1.15s ease infinite 0.12s;
      -o-animation: cssload-sequence2 1.15s ease infinite 0.12s;
      -ms-animation: cssload-sequence2 1.15s ease infinite 0.12s;
      -webkit-animation: cssload-sequence2 1.15s ease infinite 0.12s;
      -moz-animation: cssload-sequence2 1.15s ease infinite 0.12s;
    }
    &:nth-child(3) {
      left: 29px;
      animation: cssload-sequence1 1.15s ease-in-out infinite 0.23s;
      -o-animation: cssload-sequence1 1.15s ease-in-out infinite 0.23s;
      -ms-animation: cssload-sequence1 1.15s ease-in-out infinite 0.23s;
      -webkit-animation: cssload-sequence1 1.15s ease-in-out infinite 0.23s;
      -moz-animation: cssload-sequence1 1.15s ease-in-out infinite 0.23s;
    }
    &:nth-child(4) {
      left: 44px;
      animation: cssload-sequence2 1.15s ease-in infinite 0.35s;
      -o-animation: cssload-sequence2 1.15s ease-in infinite 0.35s;
      -ms-animation: cssload-sequence2 1.15s ease-in infinite 0.35s;
      -webkit-animation: cssload-sequence2 1.15s ease-in infinite 0.35s;
      -moz-animation: cssload-sequence2 1.15s ease-in infinite 0.35s;
    }
    &:nth-child(5) {
      left: 58px;
      animation: cssload-sequence1 1.15s ease-in-out infinite 0.46s;
      -o-animation: cssload-sequence1 1.15s ease-in-out infinite 0.46s;
      -ms-animation: cssload-sequence1 1.15s ease-in-out infinite 0.46s;
      -webkit-animation: cssload-sequence1 1.15s ease-in-out infinite 0.46s;
      -moz-animation: cssload-sequence1 1.15s ease-in-out infinite 0.46s;
    }
    &:nth-child(6) {
      left: 73px;
      animation: cssload-sequence2 1.15s ease infinite 0.58s;
      -o-animation: cssload-sequence2 1.15s ease infinite 0.58s;
      -ms-animation: cssload-sequence2 1.15s ease infinite 0.58s;
      -webkit-animation: cssload-sequence2 1.15s ease infinite 0.58s;
      -moz-animation: cssload-sequence2 1.15s ease infinite 0.58s;
    }
  }
}

@keyframes cssload-sequence1 {
  0% {
    height: 10px;
  }

  50% {
    height: 49px;
  }

  100% {
    height: 10px;
  }
}


@-o-keyframes cssload-sequence1 {
  0% {
    height: 10px;
  }

  50% {
    height: 49px;
  }

  100% {
    height: 10px;
  }
}


@-ms-keyframes cssload-sequence1 {
  0% {
    height: 10px;
  }

  50% {
    height: 49px;
  }

  100% {
    height: 10px;
  }
}


@-webkit-keyframes cssload-sequence1 {
  0% {
    height: 10px;
  }

  50% {
    height: 49px;
  }

  100% {
    height: 10px;
  }
}


@-moz-keyframes cssload-sequence1 {
  0% {
    height: 10px;
  }

  50% {
    height: 49px;
  }

  100% {
    height: 10px;
  }
}


@keyframes cssload-sequence2 {
  0% {
    height: 19px;
  }

  50% {
    height: 63px;
  }

  100% {
    height: 19px;
  }
}


@-o-keyframes cssload-sequence2 {
  0% {
    height: 19px;
  }

  50% {
    height: 63px;
  }

  100% {
    height: 19px;
  }
}


@-ms-keyframes cssload-sequence2 {
  0% {
    height: 19px;
  }

  50% {
    height: 63px;
  }

  100% {
    height: 19px;
  }
}


@-webkit-keyframes cssload-sequence2 {
  0% {
    height: 19px;
  }

  50% {
    height: 63px;
  }

  100% {
    height: 19px;
  }
}


@-moz-keyframes cssload-sequence2 {
  0% {
    height: 19px;
  }

  50% {
    height: 63px;
  }

  100% {
    height: 19px;
  }
}


/*===== Preloader Seventeen =======*/

/*=======Markup=====

<div class="preloader-square-swapping">
	<div class="cssload-square-part cssload-square-green"></div>
	<div class="cssload-square-part cssload-square-pink"></div>
	<div class="cssload-square-blend"></div>
</div>
*/

.preloader-square-swapping {
  margin: 30px auto;
  width: 19px;
  height: 19px;
  transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  .cssload-square-part {
    position: absolute;
    width: 19px;
    height: 19px;
    z-index: 1;
    animation: cssload-part-anim 0.92s cubic-bezier(0.445, 0.05, 0.55, 0.95) infinite alternate;
    -o-animation: cssload-part-anim 0.92s cubic-bezier(0.445, 0.05, 0.55, 0.95) infinite alternate;
    -ms-animation: cssload-part-anim 0.92s cubic-bezier(0.445, 0.05, 0.55, 0.95) infinite alternate;
    -webkit-animation: cssload-part-anim 0.92s cubic-bezier(0.445, 0.05, 0.55, 0.95) infinite alternate;
    -moz-animation: cssload-part-anim 0.92s cubic-bezier(0.445, 0.05, 0.55, 0.95) infinite alternate;
  }
  .cssload-square-green {
    background: rgb(84, 250, 212);
    right: 0;
    bottom: 0;
    animation-direction: alternate-reverse;
    -o-animation-direction: alternate-reverse;
    -ms-animation-direction: alternate-reverse;
    -webkit-animation-direction: alternate-reverse;
    -moz-animation-direction: alternate-reverse;
  }
  .cssload-square-pink {
    background: rgb(233, 111, 146);
    left: 0;
    top: 0;
  }
  .cssload-square-blend {
    background: rgb(117, 81, 125);
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    z-index: 2;
    animation: blend-anim 0.92s ease-in infinite;
    -o-animation: blend-anim 0.92s ease-in infinite;
    -ms-animation: blend-anim 0.92s ease-in infinite;
    -webkit-animation: blend-anim 0.92s ease-in infinite;
    -moz-animation: blend-anim 0.92s ease-in infinite;
  }
}

@keyframes blend-anim {
  0% {
    transform: scale(0.01, 0.01) rotateY(0);
    animation-timing-function: cubic-bezier(0.47, 0, 0.745, 0.715);
  }

  50% {
    transform: scale(1, 1) rotateY(0);
    animation-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1);
  }

  100% {
    transform: scale(0.01, 0.01) rotateY(0);
  }
}


@-o-keyframes blend-anim {
  0% {
    -o-transform: scale(0.01, 0.01) rotateY(0);
    -o-animation-timing-function: cubic-bezier(0.47, 0, 0.745, 0.715);
  }

  50% {
    -o-transform: scale(1, 1) rotateY(0);
    -o-animation-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1);
  }

  100% {
    -o-transform: scale(0.01, 0.01) rotateY(0);
  }
}


@-ms-keyframes blend-anim {
  0% {
    -ms-transform: scale(0.01, 0.01) rotateY(0);
    -ms-animation-timing-function: cubic-bezier(0.47, 0, 0.745, 0.715);
  }

  50% {
    -ms-transform: scale(1, 1) rotateY(0);
    -ms-animation-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1);
  }

  100% {
    -ms-transform: scale(0.01, 0.01) rotateY(0);
  }
}


@-webkit-keyframes blend-anim {
  0% {
    -webkit-transform: scale(0.01, 0.01) rotateY(0);
    -webkit-animation-timing-function: cubic-bezier(0.47, 0, 0.745, 0.715);
  }

  50% {
    -webkit-transform: scale(1, 1) rotateY(0);
    -webkit-animation-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1);
  }

  100% {
    -webkit-transform: scale(0.01, 0.01) rotateY(0);
  }
}


@-moz-keyframes blend-anim {
  0% {
    -moz-transform: scale(0.01, 0.01) rotateY(0);
    -moz-animation-timing-function: cubic-bezier(0.47, 0, 0.745, 0.715);
  }

  50% {
    -moz-transform: scale(1, 1) rotateY(0);
    -moz-animation-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1);
  }

  100% {
    -moz-transform: scale(0.01, 0.01) rotateY(0);
  }
}


@keyframes cssload-part-anim {
  0% {
    transform: translate3d(-10px, -10px, 0);
  }

  100% {
    transform: translate3d(10px, 10px, 0);
  }
}


@-o-keyframes cssload-part-anim {
  0% {
    -o-transform: translate3d(-10px, -10px, 0);
  }

  100% {
    -o-transform: translate3d(10px, 10px, 0);
  }
}


@-ms-keyframes cssload-part-anim {
  0% {
    -ms-transform: translate3d(-10px, -10px, 0);
  }

  100% {
    -ms-transform: translate3d(10px, 10px, 0);
  }
}


@-webkit-keyframes cssload-part-anim {
  0% {
    -webkit-transform: translate3d(-10px, -10px, 0);
  }

  100% {
    -webkit-transform: translate3d(10px, 10px, 0);
  }
}


@-moz-keyframes cssload-part-anim {
  0% {
    -moz-transform: translate3d(-10px, -10px, 0);
  }

  100% {
    -moz-transform: translate3d(10px, 10px, 0);
  }
}


/*===== Preloader Eighteen =======*/

/*=======Markup=====

<div class="preloader-jackhammer">
	<ul class="cssload-flex-container">
		<li>
			<span class="cssload-loading"></span>
		</li>
	</div>
</div>
*/

.preloader-jackhammer {
  * {
    box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
  }
  margin: 0 auto;
  max-width: 545px;
  ul li {
    list-style: none;
  }
  .cssload-flex-container {
    display: flex;
    display: -o-flex;
    display: -ms-flex;
    display: -webkit-flex;
    display: -moz-flex;
    flex-direction: row;
    -o-flex-direction: row;
    -ms-flex-direction: row;
    -webkit-flex-direction: row;
    -moz-flex-direction: row;
    flex-wrap: wrap;
    -o-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    -webkit-flex-wrap: wrap;
    -moz-flex-wrap: wrap;
    justify-content: space-around;
    li {
      padding: 10px;
      height: 97px;
      width: 97px;
      margin: 0;
      position: relative;
      text-align: center;
    }
  }
  .cssload-loading {
    display: inline-block;
    position: relative;
    width: 5px;
    height: 49px;
    background: rgb(0, 0, 0);
    margin-top: 5px;
    border-radius: 975px;
    -o-border-radius: 975px;
    -ms-border-radius: 975px;
    -webkit-border-radius: 975px;
    -moz-border-radius: 975px;
    animation: cssload-upDown2 1.15s ease infinite;
    -o-animation: cssload-upDown2 1.15s ease infinite;
    -ms-animation: cssload-upDown2 1.15s ease infinite;
    -webkit-animation: cssload-upDown2 1.15s ease infinite;
    -moz-animation: cssload-upDown2 1.15s ease infinite;
    animation-direction: alternate;
    -o-animation-direction: alternate;
    -ms-animation-direction: alternate;
    -webkit-animation-direction: alternate;
    -moz-animation-direction: alternate;
    animation-delay: 0.29s;
    -o-animation-delay: 0.29s;
    -ms-animation-delay: 0.29s;
    -webkit-animation-delay: 0.29s;
    -moz-animation-delay: 0.29s;
    &:after, &:before {
      display: inline-block;
      position: relative;
      width: 5px;
      height: 49px;
      background: rgb(0, 0, 0);
      margin-top: 5px;
      border-radius: 975px;
      -o-border-radius: 975px;
      -ms-border-radius: 975px;
      -webkit-border-radius: 975px;
      -moz-border-radius: 975px;
      animation: cssload-upDown2 1.15s ease infinite;
      -o-animation: cssload-upDown2 1.15s ease infinite;
      -ms-animation: cssload-upDown2 1.15s ease infinite;
      -webkit-animation: cssload-upDown2 1.15s ease infinite;
      -moz-animation: cssload-upDown2 1.15s ease infinite;
      animation-direction: alternate;
      -o-animation-direction: alternate;
      -ms-animation-direction: alternate;
      -webkit-animation-direction: alternate;
      -moz-animation-direction: alternate;
      animation-delay: 0.29s;
      -o-animation-delay: 0.29s;
      -ms-animation-delay: 0.29s;
      -webkit-animation-delay: 0.29s;
      -moz-animation-delay: 0.29s;
    }
    &:after {
      position: absolute;
      content: '';
      animation: cssload-upDown 1.15s ease infinite;
      -o-animation: cssload-upDown 1.15s ease infinite;
      -ms-animation: cssload-upDown 1.15s ease infinite;
      -webkit-animation: cssload-upDown 1.15s ease infinite;
      -moz-animation: cssload-upDown 1.15s ease infinite;
      animation-direction: alternate;
      -o-animation-direction: alternate;
      -ms-animation-direction: alternate;
      -webkit-animation-direction: alternate;
      -moz-animation-direction: alternate;
    }
    &:before {
      position: absolute;
      content: '';
      animation: cssload-upDown 1.15s ease infinite;
      -o-animation: cssload-upDown 1.15s ease infinite;
      -ms-animation: cssload-upDown 1.15s ease infinite;
      -webkit-animation: cssload-upDown 1.15s ease infinite;
      -moz-animation: cssload-upDown 1.15s ease infinite;
      animation-direction: alternate;
      -o-animation-direction: alternate;
      -ms-animation-direction: alternate;
      -webkit-animation-direction: alternate;
      -moz-animation-direction: alternate;
      left: -10px;
    }
    &:after {
      left: 10px;
      animation-delay: 0.58s;
      -o-animation-delay: 0.58s;
      -ms-animation-delay: 0.58s;
      -webkit-animation-delay: 0.58s;
      -moz-animation-delay: 0.58s;
    }
  }
}

@keyframes cssload-upDown {
  from {
    transform: translateY(19px);
  }

  to {
    transform: translateY(-19px);
  }
}


@-o-keyframes cssload-upDown {
  from {
    -o-transform: translateY(19px);
  }

  to {
    -o-transform: translateY(-19px);
  }
}


@-ms-keyframes cssload-upDown {
  from {
    -ms-transform: translateY(19px);
  }

  to {
    -ms-transform: translateY(-19px);
  }
}


@-webkit-keyframes cssload-upDown {
  from {
    -webkit-transform: translateY(19px);
  }

  to {
    -webkit-transform: translateY(-19px);
  }
}


@-moz-keyframes cssload-upDown {
  from {
    -moz-transform: translateY(19px);
  }

  to {
    -moz-transform: translateY(-19px);
  }
}


@keyframes cssload-upDown2 {
  from {
    transform: translateY(29px);
  }

  to {
    transform: translateY(-19px);
  }
}


@-o-keyframes cssload-upDown2 {
  from {
    -o-transform: translateY(29px);
  }

  to {
    -o-transform: translateY(-19px);
  }
}


@-ms-keyframes cssload-upDown2 {
  from {
    -ms-transform: translateY(29px);
  }

  to {
    -ms-transform: translateY(-19px);
  }
}


@-webkit-keyframes cssload-upDown2 {
  from {
    -webkit-transform: translateY(29px);
  }

  to {
    -webkit-transform: translateY(-19px);
  }
}


@-moz-keyframes cssload-upDown2 {
  from {
    -moz-transform: translateY(29px);
  }

  to {
    -moz-transform: translateY(-19px);
  }
}


/* -------- Preloader animation ---------- */

.pt-30{
	padding-top: 30px;
}

.pb-30{
	padding-bottom: 30px;
}

.mt-60{
	margin-top: 60px
}

.mb-60{
	margin-bottom: 60px
}
</style>
<div class="position-relative  iq-banner ">
   <div class="iq-navbar-header" style="height: 215px;">
      <div class="container-fluid iq-container">
         <div class="row">
            <div class="col-md-12">
               <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                     <h1>Contact Details</h1>
                     <p>Experience a simple yet powerful way to build Dashboard</p>
                  </div>
                  <!-- <div>
                     <a href="" class="btn btn-link btn-soft-light">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                           <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                        </svg>
                        Announcements
                     </a>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
      <div class="iq-header-img">
         <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
         
      </div>
   </div>
</div>
<div class="content-inner container-fluid pb-0" id="page_layout">
   <div class="row">
      
      <div class="col-lg-4">

         <div class="card">
            <div class="card-body border_bottom">
               <div class="mb-3 mb-sm-0">
                  <h4 class="me-2 mb-3 h4">{{ucwords($rs_user->first_name. ' '. $rs_user->last_name)}}</h4>
                  <!-- <span> - Web Developer</span> -->
                  <a class="user_icon" href="#">
                     <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Email" data-bs-original-title="Email">
                        <svg width="24" class="icon-24" viewBox="0 0 24 24" fill="currentColor" xmlns="">
                           <path opacity="0.4" d="M21.9999 15.9402C21.9999 18.7302 19.7599 20.9902 16.9699 21.0002H16.9599H7.04991C4.26991 21.0002 1.99991 18.7502 1.99991 15.9602V15.9502C1.99991 15.9502 2.00591 11.5242 2.01391 9.29821C2.01491 8.88021 2.49491 8.64621 2.82191 8.90621C5.19791 10.7912 9.44691 14.2282 9.49991 14.2732C10.2099 14.8422 11.1099 15.1632 12.0299 15.1632C12.9499 15.1632 13.8499 14.8422 14.5599 14.2622C14.6129 14.2272 18.7669 10.8932 21.1789 8.97721C21.5069 8.71621 21.9889 8.95021 21.9899 9.36721C21.9999 11.5762 21.9999 15.9402 21.9999 15.9402Z" fill="currentColor"></path>
                           <path d="M21.476 5.6736C20.61 4.0416 18.906 2.9996 17.03 2.9996H7.05001C5.17401 2.9996 3.47001 4.0416 2.60401 5.6736C2.41001 6.0386 2.50201 6.4936 2.82501 6.7516L10.25 12.6906C10.77 13.1106 11.4 13.3196 12.03 13.3196C12.034 13.3196 12.037 13.3196 12.04 13.3196C12.043 13.3196 12.047 13.3196 12.05 13.3196C12.68 13.3196 13.31 13.1106 13.83 12.6906L21.255 6.7516C21.578 6.4936 21.67 6.0386 21.476 5.6736Z" fill="currentColor"></path>
                        </svg>
                     </i>
                  </a>
                  <a class="user_icon " href="#">
                     <i class="icon" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Phone" data-bs-original-title="Phone">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" class="icon-24" height="24" viewBox="0 0 24 24">
                           <path d="M14.4183 5.49C13.9422 5.40206 13.505 5.70586 13.4144 6.17054C13.3238 6.63522 13.6285 7.08891 14.0916 7.17984C15.4859 7.45166 16.5624 8.53092 16.8353 9.92995V9.93095C16.913 10.3337 17.2675 10.6265 17.6759 10.6265C17.7306 10.6265 17.7854 10.6215 17.8412 10.6115C18.3043 10.5186 18.609 10.0659 18.5184 9.60018C18.1111 7.51062 16.5027 5.89672 14.4183 5.49Z" fill="currentColor"></path>
                           <path d="M14.3558 2.00793C14.1328 1.97595 13.9087 2.04191 13.7304 2.18381C13.5472 2.32771 13.4326 2.53557 13.4078 2.76841C13.355 3.23908 13.6946 3.66479 14.1646 3.71776C17.4063 4.07951 19.9259 6.60477 20.2904 9.85654C20.3392 10.2922 20.7047 10.621 21.1409 10.621C21.1738 10.621 21.2057 10.619 21.2385 10.615C21.4666 10.59 21.6698 10.4771 21.8132 10.2972C21.9556 10.1174 22.0203 9.89351 21.9944 9.66467C21.5403 5.60746 18.4002 2.45862 14.3558 2.00793Z" fill="currentColor"></path>
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M11.0317 12.9724C15.0208 16.9604 15.9258 12.3467 18.4656 14.8848C20.9143 17.3328 22.3216 17.8232 19.2192 20.9247C18.8306 21.237 16.3616 24.9943 7.6846 16.3197C-0.993478 7.644 2.76158 5.17244 3.07397 4.78395C6.18387 1.67385 6.66586 3.08938 9.11449 5.53733C11.6544 8.0765 7.04266 8.98441 11.0317 12.9724Z" fill="currentColor"></path>
                        </svg>
                     </i>
                  </a>
               </div>
            </div>
            <div class="card-header">
               <div class="header-title">
                  <h4 class="card-title">Contact Forms</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="user_details_view" id="user_details_view">
                  <form>
                     <!-- <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control border_none" id="first_name" placeholder="First Name" value="{{$rs_user->first_name}}">
                              <label for="first_name">First Name</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control border_none" id="last_name" placeholder="Last Name" value="{{$rs_user->last_name}}">
                              <label for="last_name">Last Name</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control border_none" id="email" value="{{$rs_user->email}}" disabled>
                              <label for="email">Email</label>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="form-group form-floating">
                              <input type="text" class="form-control border_none" id="phone_number" placeholder="Phone number" value="{{$rs_user->phone_number}}">
                              <label for="phone_number">Phone number</label>
                           </div>
                        </div>
                     </div> -->
                     @include('user.partial._custom_fields')
                     <div class="row">
                        <div class="col text-right">
                           <button type="button" class="btn btn-primary contact_view_btn" onclick="myFunction()">Edit</button>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- user edit view start -->
               <div class="user_edit_view" id="user_edit_view" style="display: none;">
                  <form class="row g-3 mb-6" method="POST" action="{{route('user.details', $id)}}">
                     @method('PUT')
                     @csrf
                     <div class="col-sm-6 col-md-12">
                        <div class="form-floating">
                           <input type="text" class="form-control border_none" id="first_name" placeholder="First Name" name="first_name" value="{{$rs_user->first_name}}" required>
                           <label for="first_name">First Name</label>
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-12">
                        <div class="form-floating">
                           <input type="text" class="form-control border_none" id="last_name" placeholder="Last Name" name="last_name" value="{{$rs_user->last_name}}" required>
                           <label for="last_name">Last Name</label>
                        </div>
                     </div>
                     <div class="col-sm-6 col-md-12">
                        <div class="form-floating">
                           <input class="form-control border_none" id="email" type="text" placeholder="Email" name="email" value="{{$rs_user->email}}" disabled>
                           <label for="email">Email</label>
                        </div>
                     </div>
                     <div class="col-md-12 ">
                        <div class="form-floating">
                           <input type="text" class="form-control border_none" id="phone_number" placeholder="Phone number" name="phone_number" value="{{$rs_user->phone_number}}">
                              <label for="phone_number">Phone number</label>
                        </div>
                     </div>     
                     @unless (count($custom_fields)==0)
                     <input type="hidden" id="show_custom_fields_count"  name="custom_fields_count" value="{{count($custom_fields)}}">
                     @foreach($custom_fields as $field)
                     <div class="col-md-12">
                        <div class="form-floating">
                           <input type="text" class="form-control border_none" id="show_custom_fields[{{$field->id}}]" value="{{$field->data}}" placeholder="{{$field->title}}" name="custom_fields[{{$field->id}}]" required="">
                           <label for="custom_fields[{{$field->id}}]">{{$field->title}}</label>
                        </div>
                     </div>
                     @endforeach
                     @endif
                     <div class="col-12 ">
                        <div class="text-right">
                           <button class="btn btn-primary contact_view_btn">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-5 p-0">
         <div class="card">
            <div class="card-body border_bottom">
               <ul class="d-flex nav nav-pills mb-0 text-center profile-tab" data-toggle="slider-tab" id="profile-pills-tab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active show" data-bs-toggle="tab" href="#profile-feed" role="tab" aria-selected="false">Meetings</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="tab" href="#profile-activity" role="tab" aria-selected="false">Activity</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="tab" href="#profile-friends" role="tab" aria-selected="false">Emails</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="tab" href="#profile-notes" role="tab" aria-selected="false">Notes</a>
                  </li>
               </ul>
            </div>
            <div class="profile-content tab-content iq-tab-fade-up">
               <div id="profile-feed" class="tab-pane fade active show">
                  <div class="card-body p-0">
                     <p class="p-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus</p>
                     
                  </div>
               </div>
               <div id="profile-activity" class="tab-pane fade">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Activity</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                        <ul class="list-inline p-0 m-0">
                           <li>
                              <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                              <h6 class="float-left mb-1">Client Login</h6>
                              <small class="float-right mt-1">24 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-success text-success"></div>
                              <h6 class="float-left mb-1">Scheduled Maintenance</h6>
                              <small class="float-right mt-1">23 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-danger text-danger"></div>
                              <h6 class="float-left mb-1">Dev Meetup</h6>
                              <small class="float-right mt-1">20 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans <a href="#">gummi bears</a>gummi bears jelly lollipop apple</p>
                                 <div class="iq-media-group iq-media-group-1">
                                    <a href="#" class="iq-media-1">
                                       <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                    </a>
                                    <a href="#" class="iq-media-1">
                                       <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                    </a>
                                    <a href="#" class="iq-media-1">
                                       <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                    </a>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                              <h6 class="float-left mb-1">Client Call</h6>
                              <small class="float-right mt-1">19 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li>
                           <li>
                              <div class="timeline-dots timeline-dot1 border-warning text-warning"></div>
                              <h6 class="float-left mb-1">Mega event</h6>
                              <small class="float-right mt-1">15 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div id="profile-friends" class="tab-pane fade">
                  <div class="card-header">
                     <div class="header-title">
                        <h4 class="card-title">Emails</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <ul class="list-inline m-0 p-0">
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/01.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Paul Molive</h6>
                              <p class="mb-0">Web Designer</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton9" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton9">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/05.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Paul Molive</h6>
                              <p class="mb-0">trainee</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton10" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton10">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/02.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Anna Mull</h6>
                              <p class="mb-0">Web Developer</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton11" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton11">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/03.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Paige Turner</h6>
                              <p class="mb-0">trainee</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton12" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton12">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/04.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Barb Ackue</h6>
                              <p class="mb-0">Web Designer</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton13" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton13">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/05.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Greta Life</h6>
                              <p class="mb-0">Tester</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton14" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton14">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/03.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />                              
                           <div class="ms-3 flex-grow-1">
                              <h6>Ira Membrit</h6>
                              <p class="mb-0">Android Developer</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton15" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton15">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                           <img src="{{asset('assets/images/avatars/02.png')}}" alt="story-img" class="rounded-pill avatar-40" loading="lazy" />
                           <div class="ms-3 flex-grow-1">
                              <h6>Pete Sariya</h6>
                              <p class="mb-0">Web Designer</p>
                           </div>
                           <div class="dropdown">
                              <span class="dropdown-toggle" id="dropdownMenuButton16" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                              </span>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton16">
                                 <a class="dropdown-item " href="#">Unfollow</a>
                                 <a class="dropdown-item " href="#">Unfriend</a>
                                 <a class="dropdown-item " href="#">block</a>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div id="profile-notes" class="tab-pane fade">
                  <div class="card-header">
                     <div class="header-title">
                        <h4 class="card-title">Notes</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="mt-2">
                        <h6 class="mb-1">Add Note</h6>
                        <form action="{{ route('note.add') }}" method="POST" onsubmit="return false;">
                           @csrf
                           <div class="row">
                              <div class="col">
                                 <div class="form-group">
                                    <div class="d-flex justify-content-between align-items-center">
                                       <input type="hidden" id="contact_id" name="contact_id" value="{{$rs_user->id}}">
                                       <input type="hidden" id="previous_notes" name="previous_notes" value="{{count($notes)}}">
                                       <textarea type="text" class="form-control notes_field" id="note" name="note" placeholder="Note" required></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="row" id="show_loading" style="display: none;">
                            <div class="col-md-2" >
                              <div class="preloader-dot-loading">
                              <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                              </div>
                           </div>
                           </div>

                           <div class="row">
                              <div class="col">
                                 <button type="submit" class="btn btn-primary" onclick="saveNote();">Save</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <br />
                     <div class="mt-2">
                        <h6 class="mb-1">Previous Notes: (<span id="show_previous_notes">0</span>)</h6>
                        <div id="notes">
                           @if (count($notes)==0)
                              <p>No notes found.</p>
                           @else
                           @foreach($notes as $note)
                              <div class="nav-item mb-3 p-3" style="border: 1px solid #eee; border-radius:3px; ">
                              <p>{{$note->note}}</p>
                              <b>By:</b> <span>{{$note->first_name}} {{$note->last_name}}</span> (<span>{{$note->role}}</span>)
                              <b>at:</b> <span>{{date("m/d/Y, H:i:s",strtotime($note->created_at))}}</span>   
                              <br />
                              </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3">
         <div class="card">
            <div class="card-body">
               <div class="contact_details_nav">
                  <div class="nav-item-wrapper">
                     <a class="nav-link dropdown-indicator label-1" href="#CRM" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="CRM">
                        <div class="d-flex align-items-center">
                           <h4 class="card-title">Deals ({{@count($deals)}})</h4>
                           <div class="dropdown-indicator-icon">
                              <svg height="12" class="private-icon-caret" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.5 21.1" width="5">
                                 <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none" stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                              </svg>
                           </div>
                        </div>
                     </a>
                     <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="CRM">
                           <div id="deals_list">
                              @unless (!$deals->isEmpty())
                              @foreach($deals as $deal)
                              <div class="nav-item">
                              <span>{{$deal->title}} ({{$deal->deal_owner}})</span>
                              <span>{{$deal->pipeline}} ({{$deal->stage}})</span><br />
                              </div>
                              @endforeach
                              @endif
                           </div>
                           <br style="clear: both" />
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('user.deals', $rs_user->id)}}" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text"> All Deals</span></div>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('user.deals.add', $rs_user->id)}}" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">Add New Deal</span></div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- parent pages-->
                  <div class="nav-item-wrapper">
                     <a class="nav-link dropdown-indicator label-1" href="#social" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="social">
                        <div class="d-flex align-items-center">
                           <h4 class="card-title">Contact create attribution</h4>
                           <div class="dropdown-indicator-icon">
                              <svg height="12" class="private-icon-caret" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.5 21.1" width="5">
                                 <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none" stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                              </svg>
                           </div>
                        </div>
                     </a>
                     <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="social">
                           <li class="nav-item">
                              <a class="nav-link" href="#" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">Profile</span></div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- parent pages-->
                  <div class="nav-item-wrapper">
                     <a class="nav-link dropdown-indicator label-1" href="#view-documents" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="view-documents">
                        <div class="d-flex align-items-center">
                           <h4 class="card-title">View Documents</h4>
                           <div class="dropdown-indicator-icon">
                              <svg height="12" class="private-icon-caret" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.5 21.1" width="5">
                                 <title></title>
                                 <path class="private-icon-caret__inner" d="M2 2l7.5 8.5-7.4 8.6" fill="none" stroke="#00a4bd" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"></path>
                              </svg>
                           </div>
                        </div>
                     </a>
                     <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="view-documents">
                           <li class="nav-item">
                              <a class="nav-link" href="#" data-bs-toggle="" aria-expanded="false">
                                 <div class="d-flex align-items-center"><span class="nav-link-text">View BCC Portal</span></div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $('#show_previous_notes').html($('#previous_notes').val());
});
   function saveNote(){
      var ENDPOINT = "{{ route('note.add') }}";
      var contact_id = $('#contact_id').val();
      var note = $('#note').val();
      if(note!==''){
        $('#show_loading').show();
        $.post({
          url: ENDPOINT,
          type: 'POST',
          data: {_token:"{{ csrf_token() }}", contact_id:contact_id, note:note},
          success: function(res){
            $('#show_loading').hide();
            $('#previous_notes').val(parseInt($('#previous_notes').val())+1);
            $('#show_previous_notes').html($('#previous_notes').val());
            $('#note').val('');
            var date_submitted = new Date(res.created_at).toLocaleString("en-US", {timeZone: "America/New_York"});
            var data = "<div class='nav-item mb-3 p-3' style='border: 1px solid #ccc;'><p>"+res.note+"</p><b>By:</b> <span>"+res.first_name+ " " +res.last_name + "</span> (<span>"+res.role+"</span>) <b>at:</b> <span>"+date_submitted+"</span><br /></div>";
              $('#notes').prepend(data);
          }
        });
      }
    }

  function myFunction() {
    var x = document.getElementById("user_edit_view");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
    var y = document.getElementById("user_details_view");
    if (y.style.display === "block") {
    y.style.display = "none";
    } else {
    y.style.display = "none";
    }
  }

</script>
@endsection