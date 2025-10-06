$(function(){
	var contact_prm=[];	
	contact_prm['name'] = $('.contentWrapper h1.name').text();	
	contact_prm['btn'] = $('.btn.inquiryBtn');
	contact_prm['href'] = contact_prm['btn'].attr('href');
	contact_prm['href'] += "?summary="+contact_prm['name'];
	contact_prm['btn'].attr('href',contact_prm['href']);
	//console.log(contact_prm);
});