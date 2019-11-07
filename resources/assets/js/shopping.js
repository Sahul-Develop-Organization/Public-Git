$(document).ready(function () {
	$('.cashprocess').click(function () {
		if(!confirm('Do you want to Buy')){return false;}
	});
	$('.cardprocess').click(function () {
		if(!confirm('Do you want to Buy')){return false;}
	});
});
function singleview(id) {
	$('#hidid').val(id);
	$('#productdetail').submit();
}
function addtocart(id) {
	$('#cartid').val(id);
	$('#productbuy').attr('action', 'addtocart'); 
	$("#productbuy").submit();
}
function removefromcart(id) {
	$('#delid').val(id);
	$('#placeorder').attr('action', 'removefromcart'); 
	$("#placeorder").submit();
}
function placeordered(id) {
	$('#hidid').val(id);
	$('#placeorder').attr('action', 'placeorders'); 
	$("#placeorder").submit();
}
function continueshop() {
	$('#placeorder').attr('action', 'continueshopping'); 
	$("#placeorder").submit();
}
function cashpay() {
	$('#cashondelivery').toggle();
	$('#cardpayment').hide();
}
function cardpay() {
	$('#cashondelivery').hide();
	$('#cardpayment').toggle();
}
function viewcart() {
	$('#productdetail').attr('action', 'viewcart'); 
	$("#productdetail").submit();
}
function login() {
	$('#productdetail').attr('action', 'loginuser'); 
	$("#productdetail").submit();
}
function register() {
	$('#login').attr('action', 'register'); 
	$("#login").submit();
}
function purchasedproduct() {
	$('#placeorder').attr('action', 'purchasedproducts'); 
	$("#placeorder").submit();
}
function addtocarts(id) {
	$('#hidid').val(id);
	$.session.push('cartproduct',id);
}
