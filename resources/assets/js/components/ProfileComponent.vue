<template>
    <div class="container">
        <div v-if="business != null">
            
            <div class="d-flex">
                <h1>Your Business</h1>
                <button class="btn btn-primary" @click='isEditMode = true'  v-if='!isEditMode'>Edit</button>
                <button class="btn btn-success" @click='saveEdits'  v-if='isEditMode'>Save Edits</button> 
                <button class="btn btn-danger" @click='isEditMode = false'  v-if='isEditMode'>Cancel</button> 
            </div>
             <div class="card">
                <div class="card-header">
                        <h4>Information</h4>
                </div>
            
            <div class="card-body">
                <p v-if='!isEditMode'><strong>Name:</strong> {{businessData.name}}</p> 
                <div class="form-group" v-if='isEditMode'>
                    <strong><label for="business-name">Name</label></strong> 
                    <input class="form-control" name="business-name"  v-model='businessData.name'>
                </div>
                <p v-if='!isEditMode'><strong>Description:</strong> {{businessData.description}}</p> 
                <div class="form-group" v-if='isEditMode'>
                    <strong><label for="business-description">Description</label></strong> 
                    <textarea class="form-control normal" name="business-description" 
                        placeholder="Enter your services, what you sell, and why your business is awesome" 
                        v-model='businessData.description'></textarea>
                </div>
            </div>

        </div>

        <div class="card">
            <h4 class="card-header">Address Information</h4>
            <div class="card-body">

                <p v-if="!isEditMode"><strong>Street Address: </strong> {{businessData.street}}</p>
                <div class="form-group" v-if='isEditMode'>
                    <strong><label for="business-street">Street Address: </label></strong> 
                    <input type="text" class="form-control" name="business-street"  v-model='businessData.street' placeholder="1404 e. Local Food Ave">
                </div>
                <p v-if="!isEditMode"><strong>City: </strong> {{businessData.city}}</p>
                <div class="form-group" v-if='isEditMode'>
                    <strong><label for="business-city">City: </label></strong> 
                    <input class="form-control" type="text" name="business-city"  v-model='businessData.city'>
                </div>
                <p v-if="!isEditMode"><strong>State: </strong> {{businessData.state}}</p>
                <div class="form-group" v-if='isEditMode'>
                    <strong><label for="business-state">State: </label></strong> 
                    <select class="form-control" name="business-state"  id="state" v-model="businessData.state" >
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>				                  
                </div>
                <p v-if="!isEditMode"><strong>Zip: </strong> {{businessData.zip}}</p>
                <div class="form-group" v-if='isEditMode'>
                    <strong><label for="business-zip">Zip: </label></strong> 
                    <input class="form-control" type="number" maxlength="5" name="business-zip"  v-model='businessData.zip'>
                </div>

            </div>
        </div>
        <div class="card">
            <h4 class="card-header">Contact Information</h4>
            <div class="card-body">
                <p v-if="!isEditMode"><strong>Phone: </strong> {{businessData.phone}}</p>
                <div class="form-group" v-if='isEditMode'>
                    <strong><label for="business-phone">Phone: </label></strong> 
                    <input class="form-control" type="tel" name="business-phone"  v-model='businessData.phone'>
                </div>
                <p v-if="!isEditMode"><strong>Email: </strong> {{businessData.email}}</p>
                <div class="form-group" v-if='isEditMode'>
                    <strong><label for="business-Email">Email: </label></strong> 
                    <input class="form-control" type="email" name="business-email"  v-model='businessData.email'>
                </div>
            </div>
        </div>
    </div>
           

    <div v-else class="card">
        <h4 class="card-header">Address Information</h4>
        <div class="card-body">
            <p v-if="!isEditMode"><strong>Street: </strong> {{userData.street}}</p>
            <div class="form-group" v-if='isEditMode'>
                <strong><label for="user-street">Street Address: </label></strong> 
                <input class="form-control" name="street"  v-model='userData.street'>
            </div>
            <p v-if="!isEditMode"><strong>City: </strong> {{userData.city}}</p>
            <div class="form-group" v-if='isEditMode'>
                <strong><label for="user-city">City: </label></strong> 
                <input class="form-control" name="city"  v-model='userData.city'>
            </div>
            <p v-if="!isEditMode"><strong>State: </strong> {{userData.state}}</p>
            <div class="form-group" v-if='isEditMode'>
                <strong><label for="user-state">State: </label></strong> 
                <select class="form-control" name="state"  id="state" >
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                </select>
            </div>
            <p v-if="!isEditMode"><strong>Zip: </strong> {{userData.zip}}</p>
            <div class="form-group" v-if='isEditMode'>
                <strong><label for="user-zip">Zip: </label></strong> 
                <input class="form-control" type="number" maxlength="5" name="zip"  v-model='userData.zip'>
            </div>
        </div>
    </div>
</div>
    
    
</template>

<style lang="scss" scoped>
    .d-flex {
        align-items: center;
        & button {
            margin-left: 8px;
        }
    }
    .form-control {
        width: 50%;
        display: inline-block;
    }
    .normal {
        width: 100%;
        display: block;
    }
</style>


<script>
    export default {
        data () {
            return {
                isEditMode: false,
                businessUpdateData: {},
                businessData: this.business,
                userUpdateData: {},
                userData: this.user,
                errors: []
            }
        },
        props: {
            business: {},
            user: {},
            role: {}
        },
        //Todo - Institute client side validation that prevents submission of faulty data
        methods: {
            validateData(data) {
                
            },
            saveEdits () {
                axios.put('/businesses/' + this.business.id , {updates: this.businessData})
                .then(response => {
                    console.log(response.data)
                    this.businessData = response.data;
                    this.isEditMode = false;
                })
                .catch (err => {
                    console.log(err)
                    this.isEditMode = false;
                })
            }
        }
    }
</script>
