;
//asignacion de un nombre y version al cache
const CACHE_NAME = 'v1_cache_ggopo',
	urlsToCache = [
	'./',
	'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
	'https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwJYtWqZPAA.woff2',
	'./script.js',
	'./img/ggopo.ico',
	'./img/logo-ggopo.png',
	'./assets'
	]

	self.addEventListener('install', e=>{
		e.waitUntil(
			caches.open(CACHE_NAME)
			.then(cache=>{
				return cache.addAll(urlsToCache)
				.then(()=>self.skipWaiting())
			})
			.catch(err=>console.log('Falló registro de cache', err))
		)
	})

	//Luego de haberse instalado se activa y busca los recursos para que trabajar OFF-line
	self.addEventListener('activate', e=>{
		const cacheWhitelist = [CACHE_NAME]

		e.waitUntil(
			caches.keys()
			.then(cachesNames =>{
				cacheNames.map(cacheName=>{
					//ELIMINA LO QUE NO SE NECESITA EN EL CACHE
					if(cacheWhitelist.indexOf(cacheName)===-1){
						return caches.delete(cacheName)
					}
				})
			})
		//PARA INDICARLE AL SERVICEWORKER(SW) ACTIVAR EL CACHE ACTUAL
		.then(() =>self.clients.claim())
		)
	})

	//elemento encargado de recuperar todos los recursos del navegador cuando haya internet

	self.addEventListener('fetch', e=>{
		//RESPONDE YA SEA CON EL OBJETO EN CACHÉ O CONTINUAR Y BUSCAR LA URL REAL
		e.respondWith(
			caches.match(e.request)
				.then(res=>{
					if(res){
						//recuperar del  cache
						return res
					}
					//RECUPERAR DE LA PETICIÓN A LA URL
					return fetch(e.request)
			})
		)
	})
