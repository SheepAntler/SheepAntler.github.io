// import the util package
import java.util.*;

/** This class demonstrates working with an array of object references
 *  as prep for lab 5
 *
 * @author Elspeth Stalter-Clouse
 */

public class VehicleFactory {
    // create an instance variable that will hold an array of vehicle references
    // but do not instantiate the array yet
    //Vehicle[] listOfVehicles;
    ArrayList<Vehicle> listOfVehicles;

    /** This method will create vehicles and put them in a list **/
    public void createVehicles() {
        // Debugging line
        System.out.println("beginning of createVehicles");

        // instantiate an array that will hold vehicle object references
        //listOfVehicles = new Vehicle[3];
        listOfVehicles = new ArrayList<Vehicle>();

        // create a vehicle and assign it to the first slot in the array

        // less typing method:
        //listOfVehicles.add(new Vehicle());

        //OR if you know you need to set a lot of values on the vehicle
        Vehicle vehicle1 = new Vehicle();
        // use set methods to assign values
        vehicle1.setMake("Toyota");
        vehicle1.setModel("Corolla");
        vehicle1.setYear(2013);
        vehicle1.setColor("blue");
        listOfVehicles.add(vehicle1);

        Vehicle vehicle2 = new Vehicle();
        // use set methods to assign values
        vehicle2.setMake("Toyota");
        vehicle2.setModel("4 Runner");
        vehicle2.setYear(2016);
        vehicle2.setColor("green");
        listOfVehicles.add(vehicle2);

        // Debugging line
        System.out.println("in the createVehicles");
    }

    /** this method starts each vehicle in the list **/
    public void startAllVehicles() {
        // loop through all the vehicles and call the start method on each one
        // The following line is for debugging
        System.out.println("at the end of startAllVehicles");

        // for loop
        System.out.println();
        System.out.println("With a for loop:");
        System.out.println();
        for (int counter = 0; counter < listOfVehicles.size(); counter ++) {
            Vehicle vehicle = listOfVehicles.get(counter);
            vehicle.start();
            //listOfVehicles.get(counter).start(); // this line is equivalent to lines 58 & 59; it chains them together
        }
        // enhanced for loop
        System.out.println();
        System.out.println("With an enhanced for loop:");
        System.out.println();

        for (Vehicle vehicle1 : listOfVehicles) {
            vehicle1.start();
        }

    }

    /** this method calls all the other methods **/
    public void run() {
        createVehicles();
        startAllVehicles();
    }
}
