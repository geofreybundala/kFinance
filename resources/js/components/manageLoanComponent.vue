<template>

  <div>
      <div>
          <span style="font-size:1.2rem">{{ new Date() | moment('dddd, MMMM Do YYYY, h:mm:ss a') }}</span>
          
    </div>
      <div class="card">
      
       <div class="card-header">Loan List Member    
<a class="pull-right" data-toggle="modal" data-target="#add"><button class="btn btn-success" v-if="loading==false">Add New <span class="fa fa-user-plus" ></span></button> </a></div>
     <div class="row">
 <div class="col-5"></div>
 <div class="col-2"><MoonLoader class="custom-class p-5" color="green" :loading="loading" :size="100" :sizeUnit="px"></MoonLoader></div>
 <div class="col-5"></div>
     </div>
      <div v-if="loading==false">
           
        <div class="card-body">
        

   



                <div class="near_by_hotel_wrapper">
                    <div class="">
                        <table class="table table-bordered table-responsive-sm">
                           
                            <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">User Type</th>
                                <th class="text-center">phone</th>
                                <th class="text-center">loan</th>
                                <th class="text-center">amount</th>
                                <th class="text-center">date</th>
                                <th class="text-center">Remain Time</th>
                                <th class="text-center">sms</th>
                               
            
                                <th class="text-center">action</th>
                                <!-- <th class="text-center">Invisible</th> -->
                              
                            </tr>
                            </thead>
                            <tbody>
                            
                                <tr v-for="(loan,index) in  loans.data" :key="index">
                                    <td>{{(index+1)+((current_page-1)*per_page)}}.</td>
                                    <td class="">{{loan.name}}</td>
                                    <td class="">{{loan.email}}</td>
                                    <td class="text-center">{{loan.user_type}}</td>
                                    <td class="">{{loan.phone}}</td>
                                    <td class="">{{loan.loan}}</td>
                                    <td class="">{{loan.amount}}</td>
                                    <td class="">{{loan.date}}</td>
                                    <td class="text-center"><a data-toggle="modal" @click="show_data(loan.id)" data-target="#timer"><span class="text-secondary  fa fa-clock-o fa-2x"></span></a></td>
                                    <td class=""><a data-toggle="modal" @click="show_data(loan.id)" data-target="#sms"><span class="text-primary fa fa-envelope"></span></a></td>
                                  
                                    <td class="" >
                                        <div style="display: inline-block">
                                             <a data-toggle="modal" @click="show_data(loan.id)" data-target="#edit" class='text-success'><span class="fa fa-pencil"></span></a>
                                            <a @click="delete_data(loan.id)" class='text-danger'><span class="fa fa-trash"></span></a>
                                      
                                        </div>
                                    </td>
                                
                                <!-- AUTOMATIC SEND SMS -->
                                   

                                </tr>

                            </tbody>
                                            <tfoot>
                                                <pagination :data="loans"  :limit="1" @pagination-change-page="getResults" ></pagination>
                                            </tfoot>
                        </table>
                    </div>
                </div>

                <!-- manual send sms to member -->
                  <div class="modal fade" id="sms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-2" id="exampleModalLabel"> Sms to {{show.name}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">      
                         <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control " name="phone" v-model="show.phone" id="password" placeholder="phone number"  required>
                            </div>
                        </div>

    
                        <div class="form-group row">
                            <label for="amount" class="col-sm-3 col-form-label">Compose sms</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" col="5" v-model="message" required></textarea>
                                <!-- <input type="number" class="form-control " v-model="show.amount" name="amount" id="amount" placeholder="Loan amount"  required> -->
                            </div>
                        </div>

                       



                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button @click="sendsms(show.phone)" class="btn btn-primary">Send Sms <span class="fa fa-chevron-circle-right"></span></button>
                            </div>
                        </div>
                  
                </div>

            </div>
        </div>
    </div> 
                <!--end manual send sms to member -->

<!-- EDIT RECORD -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-2" id="exampleModalLabel">Edit {{show.name}}'s Loan Details </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">      
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" v-model="show.name" name="name" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" v-model="show.email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control " name="phone" v-model="show.phone" id="password" placeholder="phone number"  required>
                            </div>
                        </div>

             

                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Loan</label>
                            <div class="col-sm-10">
                                <select class="form-control " name="loan" v-model="show.loan">
                                    <option ></option>
                                    <option >  Biashara</option>
                                    <option >   Ajira Mali</option>
                                    <option >  Executive</option>
                                    <option >  Boresha Makazi</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control " v-model="show.amount" name="amount" id="amount" placeholder="Loan amount"  required>
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control"  v-model="show.date" name="date" id="date" placeholder="loan date"  required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Deadline</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control"  v-model="show.deadline" name="date" id="date" placeholder="loan date"  required>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button data-dismiss="modal" @click="update_record(show.id,show.name,show.email,show.phone,show.amount,show.date,show.loan,show.deadline)" class="btn btn-primary">Update Detail <span class="fa fa-chevron-circle-right"></span></button>
                            </div>
                        </div>
                  
                </div>

            </div>
        </div>
    </div> 
<!-- END 0F EDIT RECORD -->
             
   <!-- add new record -->
     <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-2">Add Loan Details Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">      
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" v-model="name" name="name" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" v-model="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control " name="phone" v-model="phone" id="password" placeholder="phone number"  required>
                            </div>
                        </div>

             

                        <div class="form-group row">
                            <label for="loan" class="col-sm-3 col-form-label">Loan</label>
                            <div class="col-sm-9">
                                <select class="form-control " name="loan" v-model="loan" id="loan">
                                    <option ></option>
                                    <option >  Biashara</option>
                                    <option >   Ajira Mali</option>
                                    <option >  Executive</option>
                                    <option >  Boresha Makazi</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control " v-model="amount" name="amount" id="amount" placeholder="Loan amount"  required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control"  v-model="date" name="date" id="date" placeholder="loan date"  required>
                            </div>
                        </div>

                           <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label">Deadline</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control"  v-model="deadline" name="date" id="date" placeholder="loan date"  required>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button @click="save_record()" class="btn btn-primary">Submit Detail <span class="fa fa-chevron-circle-right"></span></button>
                            </div>
                        </div>
                  
                </div>

            </div>
        </div>
    </div> 
   <!-- end of add new record -->
        
          
<!-- TIMER -->
  <div class="modal fade" id="timer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-2" id="exampleModalLabel">TIMER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">      
                  

                    
    
    <!-- <span>{{end}}</span> -->

   <span>{{ en = end.deadline }}</span>
   <!-- <span>{{ en}}</span> -->
    <!-- <Countdown  deadline="{{en}}"></Countdown>  -->
    <span>{{ new Date() | moment("dddd, MMMM Do YYYY, h:mm:ss a") }}</span><br>

    <span>{{ end.deadline | moment("dddd, MMMM Do YYYY, h:mm:ss a") }}</span>



                       


                    

 
                     



                     
                  
                </div>

            </div>
        </div>
    </div>
<!-- END OF TIMER -->


        </div>

      </div>
    </div>
  </div>
</template>

<script>
  import   Countdown  from 'vuejs-countdown';

    export default {
      
       components: {Countdown},
        
        data(){
            return{
                 loans:[],
                 page_current:'',
                 per_page:'',
                 loading:false,
                 name:'',
                 email:'',
                 message:'',
                 phone:'',
                 amount:'',
                 loan:'',
                 date:'',
                 deadline:'',
                 show:[], 
                 end:[],
                 now:[],
                 maxmam_limit:"",
                 clock_check:"",
                 counter:0,
                 interval:null,
                 loandata:[],
                 
            }

        },methods:{
            
            sendsms(phone){
            axios.post('http://127.0.0.1:4500/api/sendsms',{
                phone:phone,
                message:this.message
            }).then(response=>{
                if(response.data.status == 200){
                       const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'success',
                                             title: response.data.message
                                              })


                }
            })
        },
            getalldata(){
                this.loading==true;
                axios.get('http://127.0.0.1:4500/api/loan').then(response=>{
                    if(response.data.status==200){
                        this.loading==false;
                       this.loans= response.data.data;

                           this.current_page=response.data.data.current_page
                           this.per_page=response.data.data.per_page
                           console.log(response.data.data.data)
                    }

                });

            },show_data(id){
                 axios.get('http://127.0.0.1:4500/api/loan/'+id).then(response=>{
                    if(response.data.status==200){
                       this.show= response.data.data;
                       this.end=response.data.data;
                       
                       
                          
                    }

                });

            },update_record(id,name,email,phone,amount,date,loan,deadline){
                var data ={
                       id:id,
                       name:name,
                       email:email,
                       phone:phone,
                       amount:amount,
                       date:date,
                       loan:loan,
                       deadline:deadline
                   }
                      this.loading=true

                      axios.put('http://127.0.0.1:4500/api/loan_update',data).then(
                       response=>{
                        if(response.data.status == 200){
                        this.getalldata();
                        this.loading=false;
                        const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'success',
                                             title: response.data.message
                                              })

                    }
                       else if(response.data.status == 201){
                            this.loading=false;
                                const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })

                       }

                       else if(response.data.status ==202){
                            this.loading=false;
                             const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })
                       }
                       else if(response.data.status ==203){
                            this.loading=false;
                               const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })
                       }
                    else{
                         this.loading=false;
                         const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })
                    }
                    
                    });

            },
               getResults(page = 1) {
			axios.get('http://127.0.0.1:4500/api/loan?page=' + page)
				.then(response => {
                       this.current_page=response.data.data.current_page
                       this.per_page=response.data.data.per_page
					    this.loans = response.data.data;
				});},
            save_record(){
                axios.post('http://127.0.0.1:4500/api/add_load',{
                    name:this.name,
                    email:this.email,
                    phone:this.phone,
                    loan:this.loan,
                    amount:this.amount,
                    date:this.date,
                    deadline:this.deadline
                }).then(response=>{
                    if(response.data.status == 200){
                        this.getalldata();
                        const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'success',
                                             title: response.data.message
                                              })

                    }
                       else if(response.data.status == 201){
                                const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })

                       }

                       else if(response.data.status ==202){
                             const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })
                       }
                       else if(response.data.status ==203){
                               const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })
                       }
                    else{
                         const Toast = this.$swal.mixin({
                              toast: true,
                                 position: 'top-end',
                                 showConfirmButton: false,
                                  timer: 4000
                                            });

                                    Toast.fire({
                                             type: 'warning',
                                             title: response.data.message
                                              })
                    }
                })
            },delete_data(loan){

             

                        this.$swal.fire({
                               title: 'Are you sure?',
                               text: "You won't be able to revert this!",
                               type: 'warning',
                               showCancelButton: true,
                               confirmButtonColor: '#3085d6',
                               cancelButtonColor: '#d33',
                               confirmButtonText: 'Yes, delete it!'
                                      }).then((result) => {
                                     if (result.value) {

                                              axios.delete('http://127.0.0.1:4500/api/loan/'+loan).then(
                                                 response=>{
                                          if(response.data.status==200){
                                                    this.$swal("Poof! record has been deleted", response.data.message, "success");
                                                    this.getalldata();
                                                        }
                    }
                )
                                 
                                                      }
})
            },refleshCurrentTime(){
               
                   
                 axios.get('http://127.0.0.1:4500/api/timer').then(response=>{
                    //this.now=response.data.data;

                });

            },autosmssend(){
                var that = this;
               setInterval(function(){
                                  
                    axios.get('http://127.0.0.1:4500/api/sms').then(response=>
                       {
                            that.loandata=response.data.data;
                            that.refleshCurrentTime();
                            
                       })
               
               
               },30000);
                
            }


            

        },
   
        mounted() {
            this.getalldata();
       
           this.autosmssend();
          // this.refleshCurrentTime();
           
        }
    }
</script>


