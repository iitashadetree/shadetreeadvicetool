//Make sure service workers are supported
if('serviceWorker' in navigator){
	window.addEventListener('load', () =>{
		navigator.serviceWorker
		.register('sW.js')
		.then(reg => console.log('Service Worker: Registered'))
		.catch(err => console.log(`Service Worker: Error:${err}`));
	//	navigator.serviceWorker.getRegistration().then(function(r){r.unregister();});
	});
}