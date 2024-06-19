<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../map/mapa/final/assets/css/style.css">
    <title>Parking Lot: Mapa!</title>
</head>
<body>
    
    	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> Parking Lot</a>
	</section>

   
	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search..." name="search" onkeyup="carregar_park(this.values)">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<span class="divider"></span>
			<div class="profile">
				<img src="../map/mapa/final/assets/imgs/customer01.jpg" alt="">
				
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profil</a></li>
                    <li><a href="marcacao.php"><i class='bx bxs-location-plus'></i> Marcação</a></li>
					<li><a href="index.php"><i class='bx bxs-log-out-circle' ></i> sair</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
			<br><br><br>
            
                <div class="mapa"  id="map">
                    

    <!-- Adicionar o script do Google Maps com sua chave de API -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlUb0n6PLMh604Hck0VR67hkKLEtwUK-E&libraries=places&callback=initMap">
    </script>

    <script>
        let map;
        let service;
        let infowindow;

        // Função de inicialização do mapa
        function initMap() {
            // Verificar se a geolocalização é suportada
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    // Criar um novo mapa e centralizá-lo na localização do usuário
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,  // Nível de zoom
                        center: userLocation

                        
                    });

                    // Adicionar um marcador na localização do usuário
                    var marker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: 'Você está aqui'
                    });

                    // Procurar estacionamentos próximos
                    var request = {
                        location: userLocation,
                        radius: '1000',  // Raio de busca em metros
                        type: ['parking']  // Tipo de lugar a procurar
                    };

                    service = new google.maps.places.PlacesService(map);
                    service.nearbySearch(request, callback);

                }, function() {
                    handleLocationError(true, map.getCenter());
                });
            } else {
                // Geolocalização não é suportada pelo navegador
                handleLocationError(false, map.getCenter());
            }
        }

        // Função de callback para processar os resultados da busca
        function callback(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (let i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                }
            }
        }

        // Função para criar marcadores para cada estacionamento encontrado
        function createMarker(place) {
            var placeLoc = place.geometry.location;
            var marker = new google.maps.Marker({
                map: map,
                position: placeLoc,
                title: place.name,
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/purple-dot.png"  // Ícone lilás
                }
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
            });
        }

        // Função para lidar com erros de geolocalização
        function handleLocationError(browserHasGeolocation, pos) {
            var infoWindow = new google.maps.InfoWindow({
                map: map
            });
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                                  'Erro: O serviço de geolocalização falhou.' :
                                  'Erro: Seu navegador não suporta geolocalização.');
        }
    </script>
                </div>
               

    <!-- =========== Scripts =========  -->
    <script src="../map/mapa/final/assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
</body>
</html>