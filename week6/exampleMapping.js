var colors = ["Red", "Blue", "Green", "Purple"];
var div1index = 0;
var div2index = 1;
var div3index = 2;
var div4index = 3;
$(document).ready(function() {
	Setup();
	$("#button1").click(function() {
		$("#div1").css({"background-color":colors[div1index]});
		div1index = IncrementColor(div1index);
	});
	$("#button2").click(function() {
		$("#div2").css({"background-color":colors[div2index]});
		div2index = IncrementColor(div2index);
	});
	$("#button3").click(function() {
		$("#div3").css({"background-color":colors[div3index]});
		div3index = IncrementColor(div3index);
	});
	$("#button4").click(function() {
		$("#div4").css({"background-color":colors[div4index]});
		div4index = IncrementColor(div4index);
	});
});

function IncrementColor(i)
{
	i++;
	i = i % 4;
	return i;
}

function Setup()
{
	$("#div1").css({"background-color":colors[div1index]});
	div1index = IncrementColor(div1index);
	$("#div2").css({"background-color":colors[div2index]});
	div2index = IncrementColor(div2index);
	$("#div3").css({"background-color":colors[div3index]});
	div3index = IncrementColor(div3index);
	$("#div4").css({"background-color":colors[div4index]});
	div4index = IncrementColor(div4index);
}