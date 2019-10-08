package java111.project5.demos;

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

        //USING CONSTRUCTORS

        // DOING MATH! I do not need to create an object instance to do this!
        // this one will change every time
        int numberOfCylinders = (int)(Math.random() * 10);

        // this one will always be 31 (3.14159 * 10 cast to an int = 31)
        //int numberOfCylinders = (int)(Math.PI * 10);

        Vehicle vehicle1 = new Car("Toyota", "Corolla", 2013, "blue", numberOfCylinders);
        listOfVehicles.add(vehicle1);
        System.out.println("I have " + Vehicle.numberOfVehicles + " vehicles.");

        // USING GET/SET
        Vehicle vehicle2 = new Car(8);
        // use set methods to assign values
        vehicle2.setMake("Toyota");
        vehicle2.setModel("4 Runner");
        vehicle2.setYear(2016);
        vehicle2.setColor("green");
        listOfVehicles.add(vehicle2);
        System.out.println("I have " + Vehicle.numberOfVehicles + " vehicles.");
        System.out.println("From vehicle 1: I have " + vehicle1.numberOfVehicles + " vehicles.");

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
            System.out.println(vehicle.toString());
            //listOfVehicles.get(counter).start(); // this line is equivalent to lines 58 & 59; it chains them together
        }
        // enhanced for loop
        System.out.println();
        System.out.println("With an enhanced for loop:");
        System.out.println();

        for (Vehicle vehicle1 : listOfVehicles) {
            System.out.println(vehicle1.toString());
        }

        // DO STUFF WITH THE MAINTAINABLE INTERFACE
        for (Maintainable item : listOfVehicles) {
            System.out.println("The cost of maintenance is: $" + item.determineMaintenanceCost());
        }
    }

    /** this method calls all the other methods **/
    public void run() {
        createVehicles();
        startAllVehicles();
    }

}
