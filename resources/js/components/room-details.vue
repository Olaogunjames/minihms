<template>
     <!--================= Page Wellcome Area ===================-->
     <div>
    <div class="page-heading-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="page-heading">{{room.room_name}}
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
              <li>RM{{room.room_number}}
              </li>
            </ul><!--/.page-nav-->
          </div><!--/.col-md-12-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/.page-title-area-->
    <!--================= Content Area ===================-->
    <div class="room-single-area">
      <div class="container">
        <div class="row">
          <div class="col-md-8 room-single-content">
            <div class="room-single-thumb">
              <div class="room-thumb-full">
                <div class="item"><img :src="'../image/' + room.image" alt="room-gallery"></div>                
              </div>              
            </div><!--/.room-single-thumb-->
            <div class="single-room list mobile-extend">
              <div class="room-info">
                <div class="room-title-area clearfix">
                  <div class="pull-left">
                    <h3 class="room-title">{{room.room_name}}</h3>
                  </div>
                  <div class="pull-right">
                    <h5>{{room.room_price}}NGN / Night</h5>
                  </div>
                </div><!--/.room-title-area-->
                <div class="room-description clearfix">
                  <h4>Room Description</h4>
                  <p>RM{{room.room_number}}</p> <br>
                  <p>{{room.room_description}}</p>                 
                </div><!--/.room-description-->
                <div class="room-service-area clearfix">
                  <ul class="room-services list-unstyled">
                    <li v-if="room.computer"><i class="fa fa-laptop"></i>computer</li>
                    <li v-if="room.wifi"><i class="fa fa-wifi"></i>WIFI</li>
                    <li v-if="room.tv"><i  class="fa fa-television"></i>Flat Screen TV</li>
                    <li v-if="room.ac"><i class="fa fa-microphone-slash"></i>Air Condition</li>
                    <li v-if="room.soundproof"><i class="fa fa-microphone"></i>Soundproof</li>
                    <li v-if="room.breakfast"><i class="fa fa-cutlery"></i>Breakfast Included</li>
                  </ul>
                </div><!--/.room-service-area-->               
              </div><!--/.room-info-->
            </div><!--/.room-single-content-->
            <div class="hidden-md hidden-lg text-center extend-btn"><span class="extend-icon"><i class="fa fa-angle-down"></i></span></div>
          </div><!--/.col-md-8-->
          <div class="col-md-4 room-single-sidebar">
            <center> 
              <div class="almost_done"></div>
              <div class="done"></div>
            <div style="display: none;" class="alert alert-success paybutton" role="alert">
            <b>The room is available</b> <br>
            click button below to proceed to payment <br>
            <button type="button" class="btn btn-info pay-pay" @click="payWithPaystack()"> Pay </button>
            </div> 
            </center> 
            <center>
            <div v-if="authh == 'Unauthenticated.'" class="alert alert-warning" role="alert">
            Please <router-link to="/login" target="_blank" type="button" class="btn btn-info"> LOGIN </router-link> or <router-link to="/register" target="_blank" type="button" class="btn btn-primary"> REGISTER </router-link> to make reservation.
            </div>   
            </center>  
            <form v-if="authh == ''"  @submit.prevent="checkAvail" id="checkavailid" class="review-comment-form box-radius">
              <p>Your reservation</p>
              <div class="single-input">
                <label class="text-uppercase">Arrival Date</label>
                <div class="input box-radius">
                  <input @change="Price" v-model="form.arrival" name="arrival" type="date" id="date-arrival" placeholder="Arrival Date" class="form-controller" :class="{ 'is-invalid': form.errors.has('arrival') }">
                  <has-error :form="form" field="arrival"></has-error>
                </div>
              </div>
              <div class="single-input">
                <label class="text-uppercase">Departure Date</label>
                <div class="input box-radius">
                  <input @change="Price" v-model="form.departure" name="departure" type="date" id="date-departure" placeholder="Departure Date" class="form-controller" :class="{ 'is-invalid': form.errors.has('departure') }">
                  <has-error :form="form" field="departure"></has-error>
                </div>
              </div>
              <div class="row">
                <div v-if="nights" class="col-sm-6"><p style="font-weight: 400; font-size: 14px;">{{nights}} <b>Night(s)</b></p></div>
                <div v-if="paymentp" class="col-sm-6"><p style="font-weight: 400; font-size: 14px;"><b>Price:</b> {{paymentp}}NGN</p> </div>
              </div>                                                                         
              <div class="single-input">
                <div class="row">
                  <div class="col-xs-6">
                    <label class="text-uppercase">Adult</label>
                    <div class="input box-radius">
                      <input v-model="form.adult" name="adult" type="number" placeholder="How Many Adults" class="form-controller" :class="{ 'is-invalid': form.errors.has('adult') }">
                      <has-error :form="form" field="adult"></has-error>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <label class="text-uppercase">Children</label>
                    <div class="input box-radius">
                      <input v-model="form.children" name="children" type="number" placeholder="How Many Children" class="form-controller" :class="{ 'is-invalid': form.errors.has('children') }">
                      <has-error :form="form" field="children"></has-error>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="checkavail btn btn-submit">Reserve Room</button>              
            </form><!--/.review-comment-form-->  
          </div><!--/.col-md-4-->
        </div>
      </div><!--/.container-->
    </div><!--/.room-list-area-->

    </div>
</template>

<script>
    export default {
       data(){
            return {
              room: {},
              paymentp:'',
              nights:'',
              authh: '',
              form: new Form({
                    room_id: '',
                    user_id:'',
                    arrival: '',
                    departure: '',
                    night: '',
                    payment: '',
                    children: '',
                    adult: '',
                    confirm: '',
                    ref_id: ''
                })              
            }
        },
        methods:{
          loadRooms(){                                            
                // this.loading = true;
                axios.get("../api/roomsclient/"+this.$route.params.id)
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 2000);
                    this.room = response.data;
                    this.form.room_id = response.data.id;
                })                 
                 axios.get('../api/user').then(response => {
                     this.form.user_id = response.data.id;
                 }).catch((message)=>{
                   this.authh = message.response.data.message
                 }) 
            },
            checkAvail(){
                $('.checkavail').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.post('../api/booking').then(
                    ()=>{
                        $('#checkavailid').trigger('reset'); 
                        $('#checkavailid').hide(); 
                        $('.paybutton').show();                          
                    }).catch(
                        (error)=>{
                        toast.fire({
                        type: 'error',
                        title: error.response.data.msg,
                        })   
                        $('.checkavail').html('Reserve Room');
                        });                                                            
            }, 
            payWithPaystack(){
            axios.get('../api/user').then(response => {                                   
            let emaill = response.data.email;        
            let amountt = this.form.payment;
                       
            var handler = PaystackPop.setup({
            key: 'pk_test_a7a3f1af9b8a244ff37b33665673db03af42f204',
            email: emaill,
            amount: amountt+'00',
            ref: 'HMS'+Math.floor((Math.random() * 100000000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you            


            callback: function(response){
                $('.paybutton').hide();     
                $('.almost_done').html(' <p><i class="fa fa-spin fa-spinner"></i> <br><b>Saving</b>.... <br> Please wait </p>'); 
                console.log(response)                        
                let ref =   response.reference;
                var url = '../api/reserve/pay';
                var post = 'POST';                                     
                $.ajax({
                    type : post,
                    url : url,
                    data : {'ref_id' : ref},
                    dataTy : 'json',
                    success: function(data){
                        console.log(data);                
                        $('.almost_done').hide();  
                        $('.done').html('<div class="alert alert-success" role="alert">Payment Succesful <br><a href="">Click Reload Page</a></div>');                                         
                    }
            
                })
                //   alert('success. transaction ref is ' + response.reference);
            },
            onClose: function(){
                alert('window closed');
            }
            });
            handler.openIframe();
            })         
        }, 
                    
           Price(){
            console.log(this.form.arrival)         

            const arri = new Date(this.form.arrival)
            const dep = new Date(this.form.departure)
            const _MS_PER_DAY = 1000 * 60 * 60 * 24;
            const utc1 = Date.UTC(arri.getFullYear(), arri.getMonth(), arri.getDate());
            const utc2 = Date.UTC(dep.getFullYear(), dep.getMonth(), dep.getDate());

            const nights = Math.floor((utc2 - utc1) / _MS_PER_DAY);
            axios.get("../api/rooms/"+this.$route.params.id).then((response)  =>  { 
                const room_price_f = response.data.room_price;
                const pricep = nights * room_price_f;
                console.log(pricep);
                this.paymentp = pricep;
                this.nights = nights;
                this.form.payment = pricep;
                this.form.night = nights;
                })                        
            
            // this.form.fill(form.adult);
          }
        }, 
        mounted() {
            console.log(this.$route.params);                       
             this.loadRooms();              
            Fire.$on('afterAction', () => {this.loadRooms()}) 
        }
    }
</script>
