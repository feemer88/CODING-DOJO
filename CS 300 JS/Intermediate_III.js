function hello(a, b){
    console.log('random number ' + a + ' random string ' + b);

function MainFunction(x){
    var randnumber = Math.floor(Math.random()*10);
    var randstring = Math.random().toString(36).slice(2)
    return x(randnumber, randstring);
}

MainFunction(hello);



function  mult(num1, num2 )
{
	console.log("num1 is equal to " + a + " num2 is not a number but a string" + b);
}

function action(something)
{
	var randnum = Math.floor((Math.random() * 10) + 1);
	var randstr = Math.random().toString(5).slice(2);
	return soemthing(randnum, randstr);
}
console.log(action(mult));