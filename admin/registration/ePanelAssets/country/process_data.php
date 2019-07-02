<?php
include('../connect.php');


/*
if(isset($_POST['action']) && $_POST['action']=="add") //menangani aksi penambahan data pelanggan
  {  
    
	 $name=$_POST['add_name'];
    // $address=$_POST['add_address'];
    // $exam_no=$_POST['add_exam_no'];   
     //$pattern="/^[A-Z]{2}\d{4}\b/";
     if(($name=="")){
	  echo '{"status":"1"}';
      exit;
     }
	 else{
     $test=mysqli_query($con,"INSERT INTO country(country) VALUES('$name')") or die ("data gagal ditambahakan!");
     echo '{"status":"3"}';
     exit; 
	 }
  }
 */
if(isset($_POST['action'])&& $_POST['action']=="update") //menangani aksi perubahan data pelanggan
  {  
    //get all Post Values
$OrganisationName = $_POST['edit_OrganisationName'];
$Asset = $_POST['edit_Assets'];
$LandOwnership = $_POST['edit_LandOwnership'];
$Lease = $_POST['edit_Lease7Higher'];
$LandAcquisation = $_POST['edit_LandAcquisationDate'];
$LandCurrent = $_POST['edit_LandCurrentValue'];
$LandSize = $_POST['edit_TotalLandSize'];
$OfficeOwnership = $_POST['edit_OfficeOwnership']; 
$OfficeDate = $_POST['edit_OfficeAcquisationDate'];
$OfficeCap = $_POST['edit_OfficeTotalCapacity'];
$OfficeVal = $_POST['edit_OfficeCurrentValue'];
$FencedOwnership = $_POST['edit_FencedYardOwnership'];
$FencedDate = $_POST['edit_FencedYardDate'];
$FencedSize = $_POST['edit_FencedYardSize'];
$FencedVal = $_POST['edit_FencedYardCurrentValue'];
$StorageOwnership = $_POST['edit_StorageCapacityOwnership'];
$StorageCap = $_POST['edit_StorageTotalCapacity'];
$StorageVal = $_POST['edit_StorageCurrentValue'];
$StorageSize = $_POST['edit_StorageSize'];
$FactoryType = $_POST['edit_TypeFactory'];
$FactoryOwnership = $_POST['edit_FactoryOwnership'];
$FactoryDate = $_POST['edit_FactoryAcquisation'];
$FactoryCap = $_POST['edit_FactoryCapacity'];
$FactoryValue = $_POST['edit_FactoryCurrentValue'];
$TransportOwnership = $_POST['edit_TransportOwnership'];
$VehicleDate = $_POST['edit_VehicleAcquisationDate'];
$VehicleCap = $_POST['edit_VehicleTotalCapacity'];
$VehicleVal = $_POST['edit_VehicleValue'];
$TruckOwnership = $_POST['edit_TruckOwnership'];
$TruckDate = $_POST['edit_TruckAcquisationDate'];
$TruckCap = $_POST['edit_TruckCapacity'];
$TruckValue = $_POST['edit_TruckCurrentValue'];
$EquipmentOwnership = $_POST['edit_OfficeEquipmentOwnership'];
$EquipmentDate = $_POST['edit_EquipmentDateAcquisation'];
$EquipmentVal = $_POST['edit_EquipmentCurrentValue'];
$ComputerOwnership = $_POST['edit_ComputerOwnership'];
$ComputerDate = $_POST['edit_ComputerDateAcquisation'];
$ComputerCurrentVal = $_POST['edit_ComputerCurrentValue'];
$OtherAssetOwn = $_POST['edit_OtherAssetOwnership'];
$OtherAssetDate = $_POST['edit_OtherAssetAcquisation'];
$OtherAssetCap = $_POST['edit_OtherAssetTotalCapacity'];
$OtherAssetVal = $_POST['edit_AssetCurrentValue'];
$InstanceName = $_POST['edit_InstanceName'];
$InstanceID = $_POST['edit_InstanceID'];


	 
     $test = mysqli_query($con,"
     UPDATE new_opensme_rawdata2
  set
 `Organisation Name`='$OrganisationName',
 `Assets`='$Asset',
 `Land Ownership`='$LandOwnership',
 `Lease 7 years Higher`='$Lease',
 `Land Acquistion Date`='$LandAcquisation',
 `Land Total Size`='$LandSize',
 `Land Current Value`='$LandCurrent', 
 `Office Ownership`='$OfficeOwnership',
 `Office Acquistion Date`='$OfficeDate',
 `Office Total Capacity`='$OfficeCap', 
 `Office Current Value`='$OfficeVal',
 `Fenced Yard Ownership`='$FencedOwnership', 
 `Fenced Yard Acquistion Date`='$FencedDate',
 `Fenced Yard Total Size`='$FencedSize',
 `Fenced Yard Current Value`='$FencedVal',
 `Asset Ownership`='$StorageOwnership',
 `Asset Total Capacity`='$StorageCap',
 `Asset Total Current Value`='$StorageVal',
 `Type of Factory`='$FactoryType',
 `Ownership factory Asset`='$FactoryOwnership',
 `Factory Land Acquisation`='$FactoryDate',
 `Factory Capacity`='$FactoryCap',
 `Factory Current Value`='$FactoryValue',
 `Ownership of Transport`='$TransportOwnership',
 `Vehicle Acquisation Date`='$VehicleDate',
 `Vehicle Total Capacity`='$VehicleCap',
 `Vehicle Total Current Value`='$VehicleVal',
 `Truck Ownership`='$TruckOwnership',
 `Truck Acquisation Date`='$TruckDate',
 `Truck Capacity`='$TruckCap',
 `Truck Current Value`='$TruckValue',
 `Office Equipment Ownership`='$EquipmentOwnership',
 `Equipment Date Acquisation`='$EquipmentDate',
 `Equipment Current Value`='$EquipmentVal',
 `Computer Ownership`='$ComputerOwnership',
 `Computer Date Acquisation`='$ComputerDate',
 `Computer Current Value`='$ComputerCurrentVal',
 `Ownership Other Asset`='$OtherAssetOwn',
 `Other Asset Acquisation Date`='$OtherAssetDate',
 `Other Asset Total Capacity`='$OtherAssetCap',
 `Other Asset Current Value`='$OtherAssetVal'
where instanceID='$InstanceID'
     ") or die("could not update!");









     

     exit;
  }
  else if(isset($_POST['action']) && $_POST['action']=="delete") //menangani aksi penghapusan data pelanggan
  {
     
	 $id = $_POST['delete_id'];
     
     $test = mysqli_query($con,"UPDATE new_opensme_rawdata2 SET `instanceName`='Deleted' WHERE instanceID='$instanceID'");

     if(mysqli_affected_rows($con) == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
       //echo '{"status":"1"}';
        echo "entry has been deleted";
     }else{
       //echo '{"status":"0"}';
         echo "entry failed to be deleted";
     }
     exit;
  }
  ?>