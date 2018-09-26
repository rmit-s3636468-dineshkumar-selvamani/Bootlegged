<table class="table table-dark">
                    
                    <tr>
                <td><label>Product Type: </label></td>
                <td>
                    <!-- <input type="text" id="type" name="type" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); "  > -->
                    @if($item->Listing_type == "Red Wine")
                   <select id="type" style="width:287px;" name="type" class="custom-select" >
                            <option value="Red Wine" selected="selected" >Red Wine</option>
                            <option value="White Wine">White Wine</option>
                            <option value="Cider">Cider</option>
                            <option value="Beer">Beer</option>
                            <option value="Spirits">Spirits</option>
                            <option value="Sparkling">Sparkling</option>
                            <option value="Pre-Mixed">Pre-Mixed</option>
                          </select>
                   @elseif($item->Listing_type == "White Wine")
                   <select id="type" style="width:287px;" name="type" class="custom-select">
                            <option value="Red Wine" >Red Wine</option>
                            <option value="White Wine" selected="selected">White Wine</option>
                            <option value="Cider">Cider</option>
                            <option value="Beer">Beer</option>
                            <option value="Spirits">Spirits</option>
                            <option value="Sparkling">Sparkling</option>
                            <option value="Pre-Mixed">Pre-Mixed</option>
                          </select>
                    @elseif($item->Listing_type == "Cider")
                     <select id="type" style="width:287px;" name="type" class="custom-select">
                            <option value="Red Wine" >Red Wine</option>
                            <option value="White Wine" >White Wine</option>
                            <option value="Cider" selected="selected">Cider</option>
                            <option value="Beer">Beer</option>
                            <option value="Spirits">Spirits</option>
                            <option value="Sparkling">Sparkling</option>
                            <option value="Pre-Mixed">Pre-Mixed</option>
                          </select>
                     @elseif($item->Listing_type == "Beer")
                     <select id="type" style="width:287px;" name="type" class="custom-select">
                            <option value="Red Wine" >Red Wine</option>
                            <option value="White Wine" >White Wine</option>
                            <option value="Cider">Cider</option>
                            <option value="Beer" selected="selected">Beer</option>
                            <option value="Spirits">Spirits</option>
                            <option value="Sparkling">Sparkling</option>
                            <option value="Pre-Mixed">Pre-Mixed</option>
                          </select>
                    @elseif($item->Listing_type == "Spirits")
                     <select id="type" style="width:287px;" name="type" class="custom-select">
                            <option value="Red Wine" >Red Wine</option>
                            <option value="White Wine" >White Wine</option>
                            <option value="Cider">Cider</option>
                            <option value="Beer">Beer</option>
                            <option value="Spirits" selected="selected">Spirits</option>
                            <option value="Sparkling">Sparkling</option>
                            <option value="Pre-Mixed">Pre-Mixed</option>
                          </select>
                      @elseif($item->Listing_type == "Sparkling")
                     <select id="type" style="width:287px;" name="type" class="custom-select">
                            <option value="Red Wine" >Red Wine</option>
                            <option value="White Wine" >White Wine</option>
                            <option value="Cider">Cider</option>
                            <option value="Beer">Beer</option>
                            <option value="Spirits" >Spirits</option>
                            <option value="Sparkling" selected="selected">Sparkling</option>
                            <option value="Pre-Mixed">Pre-Mixed</option>
                          </select>
                           @elseif($item->Listing_type == "Pre-Mixed")
                     <select id="type" style="width:287px;" name="type" class="custom-select">
                            <option value="Red Wine" >Red Wine</option>
                            <option value="White Wine" >White Wine</option>
                            <option value="Cider">Cider</option>
                            <option value="Beer">Beer</option>
                            <option value="Spirits" >Spirits</option>
                            <option value="Sparkling">Sparkling</option>
                            <option value="Pre-Mixed" selected="selected">Pre-Mixed</option>
                          </select>
                          @endif    
                </td>
                    </tr>
                    
                    <tr>
                
                <td><label>Total Quantity: </label></td>
                <td><input type="text" id="tqty" name="tqty" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); "></td>
                    </tr>
                    
                    <tr>
                <td><label>Unit Price: </label></td>
                <td><input type="text" id="unitPrice" name="unitPrice" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " ></td>
                    </tr>

                    <tr>
                <td><label>Total Price: </label></td>
                <td><input type="text" name="totalPrice" id="totalPrice" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); "></td>
                    </tr>

                    <tr>
                <td><label>Expiry: </label></td>
                <td><input type="text" id="expiry" name="expiry" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " ></td>
                    </tr>

                    <tr>
                <td><label>Vintage: </label></td>
                <td><input type="text" id="vintage" name="vintage" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " ></td>
                    </tr>

                    <tr>
                <td><label>Condition: </label></td>
                <td><input type="text" id="condition" name="condition" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " ></td>
                    </tr>
                    <tr>
                <td><label>Prouct Status: </label></td>
                <td>
                    @if($item->Listing_active == 1)
                    <select  id="status" name="status"   style="width:287px;"  class="custom-select">
                    <option value="1" selected="selected">Active</option>
                    <option value="0">Inactive</option></td>
                    @else
                     <select  id="status" name="status"   style="width:287px;"  class="custom-select">
                    <option value="1" >Active</option>
                    <option value="0" selected="selected" >Inactive</option></td>
                    @endif
                    </tr>
                    <tr>
                <td><label>Image: </label></td>
                <td><input type="file" id="pimage" name="pimage" style="background-color: rgb(33,35,39); color: white; border-color: rgb(33,35,39); " ></td>
                    </tr>
            </table>