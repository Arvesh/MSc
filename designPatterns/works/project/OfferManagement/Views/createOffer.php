<input type="hidden" id="titlePage" name="titlePage" value="Create Offer" />
  <form action="<?php echo ABSOLUTE_URL ?>offer/save" method="post">
            Enter Customer Name
           <input type="text" name="customer"> </input><br>
            Select Room
            <hr>
            <input type="radio" name="RoomOpt[]" value="allrooms" id="">All Rooms
           
           <label for="">Specific Rooms</label>
            <select id="selectroom" name="selectroom" >
                <option>--Select Room--</option>
                <?php foreach($rooms as $room): ?>
                <option value="<?php echo $room["room_Id"] ?>"><?php echo $room['room_Name']; ?></option>
                <?php endforeach;?>
            </select>
            <input type="submit" value="Add Room to listbox"></input>
            <br>
            <select id="roomadded" name="roomadded" size="4" multiple="multiple">
                <option>room1</option>
            </select><br>
            Description
            <hr>
            <label>Valid From</label>
            <input type="text" id="validFrom" name="validFrom"></input><br>
            <label>Valid To</label>
            <input id="validTo" type="text" name="validTo"></input><br>
            <label>Description</label>
            <textarea rows="4" cols="50">
                Description
            </textarea><br>
            Rebate
            <label>Type</label>
            <select id="selectType" name="selectType" >
                <option>--Select Type--</option>
            </select>
            <label>Minimum Stay</label>
            <input type="text" id="minimumStay" name="minimumStay"></input><br>
            Combination
            <hr>
            Promotion
           <select id="selectPromotion" name="selectPromotion" >
                <option>--Select Offer Type--</option>
            </select>
            <input type="submit" id="addPromotion" value="Add PRomotion to listbox"></input>
            <br>
            Combinable with
            <select id="promotiondded" name="promotiondded" size="4" multiple="multiple">
                <option>PRomotion1</option>
            </select><br>
            
            <input type="submit" id="save" value="SAVE"></input>
             <input type="submit" id="delete" value="DELETE"></input>
             <input type="submit" id="clear" value="CLEAR"></input>
            
            
        </form>