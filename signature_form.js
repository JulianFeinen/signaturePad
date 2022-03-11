window.onload = (function()
{
    const canvas = document.querySelector("canvas");
    const abbild = document.getElementById("abbild");
    const btnclear = document.querySelector(".clear");
    var signaturePad = new SignaturePad(canvas, {//customizable signature pad as canvas element
        backgroundColor: 'rgba(250,250,250)'
    });
    signaturePad.onEnd =function(){//fires everytime u lift the paintbrush
        abbild.value = canvas.toDataURL();
    };
    btnclear.addEventListener("click",clear, false);//selfexplanatory
    function clear()
    {
        signaturePad.clear();
        abbild.value="";//important so u dont accidently sent an image when its clear
    }
    window.onresize = resizeCanvas();//not really necessary
    resizeCanvas();
    function resizeCanvas()
   {
       var ratio = Math.max(window.devicePixelRatio || 1,1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }
})

    



