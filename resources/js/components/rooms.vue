<template>
     <!--================= Page Wellcome Area ===================-->
     <div>
    <div class="page-heading-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="page-heading">find your room
            </h2><!--/.page-heading-->
          </div><!--/.col-md-12-->
        </div><!--/.row-->
      </div><!--/.container--> 
    </div><!--/.page-heading-area-->
    <div class="page-nav-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb page-nav list-unstyled">
              <li><router-link to="/">Home</router-link></li>
              <li>Room
              </li>
            </ul><!--/.page-nav-->
          </div><!--/.col-md-12-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/.page-title-area-->
    <!--================= Content Area ===================-->
    <div class="room-grid-area">
      <div class="container">
        <div class="row">
          <div v-for="room in rooms" :key="room.id" class="col-md-4 col-sm-6 col-xs-6">
            <div class="single-room grid"><img :src="'image/' + room.image" alt="room" class="room-thumb">
              <div class="room-info box-radius">
                <h5>{{room.room_price}}NGN / Night </h5>
                <h3 class="room-title"><router-link :to="'room/'+room.id"> RM{{room.room_number}}</router-link></h3>
                <h4 class="room-structure">{{room.room_name}}</h4>
                <div class="room-services">                           <i v-if="room.computer" class="fa fa-laptop"></i><i v-if="room.tv" class="fa fa-television"></i><i v-if="room.ac" class="fa fa-microphone-slash"></i><i v-if="room.soundproof" class="fa fa-microphone"></i><i v-if="room.breakfast" class="fa fa-cutlery"></i><i v-if="room.wifi" class="fa fa-wifi"></i></div><router-link :to="'room/'+room.id" class="btn btn-details">more details</router-link>
              </div>
            </div><!--/.single-room-->
          </div><!--/.col-md-4-->                     
        </div><!--/.row-->
        <div class="row">
          <div class="col-md-12">
            <!--Paginations-->
            <nav class="paginations">
              <div class="post-pagination paging-navigation">
                <ul class="nav-links">
                  <li class="nav-previous">
                    <!--disabled add when no pagination--><a href="#"><i class="fa fa-angle-left"></i></a>
                  </li>
                  <li><a href="#">01</a></li>
                  <li class="active"><a href="#">02</a></li>
                  <li><a href="#">03</a></li>
                  <li><a href="#">04</a></li>
                  <li><a href="#">...</a></li>
                  <li><a href="#">102</a></li>
                  <li class="nav-next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
              </div><!--/.post-pagination-->
            </nav><!--/.pagination-->
          </div><!--/.col-md-12-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/.room-grid-area-->
    </div>
</template>

<script>
    export default {
       data(){
            return {
              rooms: {},
              // form: new Form({
              //       id: '',
              //       room_number: '',
              //       room_name: '',
              //       room_price: '',
              //       room_description: '',
              //       image: '',
              //       tv: '',
              //       breakfast: '',
              //       wifi: '',
              //       soundproof: '',
              //       computer: '',
              //       ac: ''
              //   })              
            }
        },
        methods:{
          loadRooms(){                                            
                // this.loading = true;
                axios.get("../api/roomsclient")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 2000);
                    this.rooms = response.data;
                })              
            },
        }, 
        mounted() {
            console.log('Component mounted.')
             this.loadRooms(); 
            Fire.$on('afterAction', () => {this.loadRooms()}) 
        }
    }
</script>
