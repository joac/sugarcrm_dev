/*
 Copyright (c) 2010, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.com/yui/license.html
 version: 3.3.0
 build: 3167
 */
YUI.add("anim-easing",function(B){var A={easeNone:function(D,C,F,E){return F*D/E+C;},easeIn:function(D,C,F,E){return F*(D/=E)*D+C;},easeOut:function(D,C,F,E){return-F*(D/=E)*(D-2)+C;},easeBoth:function(D,C,F,E){if((D/=E/2)<1){return F/2*D*D+C;}return-F/2*((--D)*(D-2)-1)+C;},easeInStrong:function(D,C,F,E){return F*(D/=E)*D*D*D+C;},easeOutStrong:function(D,C,F,E){return-F*((D=D/E-1)*D*D*D-1)+C;},easeBothStrong:function(D,C,F,E){if((D/=E/2)<1){return F/2*D*D*D*D+C;}return-F/2*((D-=2)*D*D*D-2)+C;},elasticIn:function(E,C,I,H,D,G){var F;if(E===0){return C;}if((E/=H)===1){return C+I;}if(!G){G=H*0.3;}if(!D||D<Math.abs(I)){D=I;F=G/4;}else{F=G/(2*Math.PI)*Math.asin(I/D);}return-(D*Math.pow(2,10*(E-=1))*Math.sin((E*H-F)*(2*Math.PI)/G))+C;},elasticOut:function(E,C,I,H,D,G){var F;if(E===0){return C;}if((E/=H)===1){return C+I;}if(!G){G=H*0.3;}if(!D||D<Math.abs(I)){D=I;F=G/4;}else{F=G/(2*Math.PI)*Math.asin(I/D);}return D*Math.pow(2,-10*E)*Math.sin((E*H-F)*(2*Math.PI)/G)+I+C;},elasticBoth:function(E,C,I,H,D,G){var F;if(E===0){return C;}if((E/=H/2)===2){return C+I;}if(!G){G=H*(0.3*1.5);}if(!D||D<Math.abs(I)){D=I;F=G/4;}else{F=G/(2*Math.PI)*Math.asin(I/D);}if(E<1){return-0.5*(D*Math.pow(2,10*(E-=1))*Math.sin((E*H-F)*(2*Math.PI)/G))+C;}return D*Math.pow(2,-10*(E-=1))*Math.sin((E*H-F)*(2*Math.PI)/G)*0.5+I+C;},backIn:function(D,C,G,F,E){if(E===undefined){E=1.70158;}if(D===F){D-=0.001;}return G*(D/=F)*D*((E+1)*D-E)+C;},backOut:function(D,C,G,F,E){if(typeof E==="undefined"){E=1.70158;}return G*((D=D/F-1)*D*((E+1)*D+E)+1)+C;},backBoth:function(D,C,G,F,E){if(typeof E==="undefined"){E=1.70158;}if((D/=F/2)<1){return G/2*(D*D*(((E*=(1.525))+1)*D-E))+C;}return G/2*((D-=2)*D*(((E*=(1.525))+1)*D+E)+2)+C;},bounceIn:function(D,C,F,E){return F-B.Easing.bounceOut(E-D,0,F,E)+C;},bounceOut:function(D,C,F,E){if((D/=E)<(1/2.75)){return F*(7.5625*D*D)+C;}else{if(D<(2/2.75)){return F*(7.5625*(D-=(1.5/2.75))*D+0.75)+C;}else{if(D<(2.5/2.75)){return F*(7.5625*(D-=(2.25/2.75))*D+0.9375)+C;}}}return F*(7.5625*(D-=(2.625/2.75))*D+0.984375)+C;},bounceBoth:function(D,C,F,E){if(D<E/2){return B.Easing.bounceIn(D*2,0,F,E)*0.5+C;}return B.Easing.bounceOut(D*2-E,0,F,E)*0.5+F*0.5+C;}};B.Easing=A;},"3.3.0",{requires:["anim-base"]});
