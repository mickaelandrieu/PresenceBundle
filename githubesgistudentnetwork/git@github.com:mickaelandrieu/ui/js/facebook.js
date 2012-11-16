 window.fbAsyncInit = function() {
			    FB.init({
			      appId      : '213421922121352', // App ID
			      channelUrl : '//localhost/Projects/esgistudentnetwork/channel.html', // Channel File
			      status     : true, // check login status
			      cookie     : true, // enable cookies to allow the server to access the session
			      xfbml      : true  // parse XFBML
			    });

			    // Additional initialization code here
			    FB.getLoginStatus(function(response) {
				    if (response.status === 'connected') {

					    var uid = response.authResponse.userID;
					    var accessToken = response.authResponse.accessToken;

					    /* mes propres infos, attention il faut changer les autorisation dans l'application  
					     * il faut retirer et remettre l'application pour accepter les nouveaux droits
					     */
					     FB.api('/me?fields=id,name,first_name,last_name,gender,email,birthday',  function(response) 
			    		{
				           if (response.error) 
				           {
				               alert(JSON.stringify(response.error));
				               alert('pb de chargement de mes propres infos...');
				           } 
				           else 
				           {    
				               console.log(response);
				               var $first_name = response.first_name;
				               var $last_name = response.last_name;
				               var $birthday = response.birthday;
				               var $email = response.email;

				               /* populer le formulaire */
				               $(document).ready(function(){
				               		$('#first_name').val($first_name);
				               		$('#last_name').val($last_name);
				               		$('#birthday').val($birthday);
				               		$('#email').val($email);
				               	});
				           }
			    		});

					    /* afficher la liste des amis */
					    FB.api('/me/friends', { fields: 'id, name', limit: 10 },  function(response) 
			    		{
				           if (response.error) 
				           {
				               alert(JSON.stringify(response.error));
				               alert('problème de chargement de mes amis');
				           } 
				           else 
				           {    
				               alert("Loading friends...");
				               response.data.forEach(function(item) 
				               {           
				               	// pouvoir inviter un ami en particulier 

				                	document.getElementById('friends').innerHTML+='<a href="#" onclick="sendRequestToFriend('+item["id"]+'); return false;" ><image src="https://graph.facebook.com/'+item['id']+'/picture" /></a>';         
				               });
				           }
			    		});

				  	} else if (response.status === 'not_authorized') {
				    	alert('you are no authorized');
				  	} else {
				        alert('you are no logged');
				    }
				}); // fin getLoginStatus

				
			};//fin window.fbAsyncInit

			  // Load the SDK Asynchronously
			  (function(d){
			     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
			     if (d.getElementById(id)) {return;}
			     js = d.createElement('script'); js.id = id; js.async = true;
			     js.src = "//connect.facebook.net/fr_FR/all.js";
			     ref.parentNode.insertBefore(js, ref);
			   }(document));


			  function publication() {
					FB.ui(
					  {
					    method: 'feed',
					    name: 'Parlez de ce site sur Facebook !',
					    link: 'http://apps.facebook.com/esgi_network_student/',
					    picture: 'http://fbrell.com/f8.jpg',
					    caption: 'Le réseau des étudiants ESGI',
					    description: 'Vous devez vous y inscrire, normal ^^.'
					  },
					  function(response) {
					    if (response && response.post_id) {
					      alert('Post was published.');
					    } else {
					      alert('Post was not published.');
					    }
					  }
					);
				}

				function sendRequestToFriend($id) {
				  FB.ui({method: 'apprequests',
				    message: "Testes mon application, s'il te plait ;)",
				    to: $id
				  }, requestCallback);
				}

				function requestCallback(response) {
       			 // Handle callback here
      			}