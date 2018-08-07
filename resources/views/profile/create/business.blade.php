


    <h2 class="text-center">Please enter more details about your Business</h2>
    <form action="{{route('businesses')}}" method="post">
        @csrf
        <h4>Business Information</h4>
        <hr>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name='name' required>
        </div>
        <div class="form-group">
            <label for="name">Type</label>
            <select name="type" id="type" class="form-control">
                <option value="market">Farmers Market</option>
                <option value="restaurant">Restaurant</option>
                <option value="farm">Farm</option>
                <option value="distributor">Distributor</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name='description' placeholder="Enter your services, what you sell, and why your business is awesome" required></textarea>
        </div>
        
        <h4>Business Location</h4>
        <hr>
        <div class="form-group">
            <label for="street">Street Address</label>
            <input type="text" class="form-control" name='street'  id="street" placeholder="APT 234 1404 E Local Food Ave" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name='city'  id="city" required>
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <select name="state"  id="state" class="form-control">
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
        <div class="form-group">
            <label for="city">Zip Code</label>
            <input type="number" class="form-control" name='zip'  id="zip" placeholder="40929" required>
        </div>
        <h4>Contact Information</h4>
        <hr>
        <div class="form-group">
                <label for="name">Contact Name</label>
                <input type="text" class="form-control" name='contact_name' required>
            </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" class="form-control" name='phone' placeholder="optional">
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" name='email' placeholder="optional">
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>

