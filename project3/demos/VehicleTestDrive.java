/** Create vehicle objects and test them by calling the start method.
 *
 * @author Elspeth Stalter-Clouse
 */

public class VehicleTestDrive {

    /** Instantiate 2 vehicle objects
     *  and call the start method on each one.
     *
     * @param args command line arguments (not used here)
     */
    public static void main(String[] args) {

        // Instantiate an array that will hold 2 Vehicle object references
        Vehicle[] vehicles = new Vehicle[2];

        // Instantiate 2 vehicles, one for each index
        vehicles[0] = new Vehicle();
        vehicles[1] = new Vehicle();

        // Set some details on the first vehicle object
        vehicles[0].setMake("Toyota");
        vehicles[0].setModel("Corolla");
        vehicles[0].setYear(2013);
        vehicles[0].setColor("blue");

        // Set some details on the second vehicle object
        vehicles[1].setMake("Subaru");
        vehicles[1].setModel("Outback");
        vehicles[1].setYear(2018);
        vehicles[1].setColor("red");

        // Call the start method on both vehicles
        //vehicles[0].start();
        //vehicles[1].start();

        // Call the start method on each vehicle in the array

        for (int counter = 0; counter < vehicles.length; counter++) {
            vehicles[counter].start();
        }
    }
}
