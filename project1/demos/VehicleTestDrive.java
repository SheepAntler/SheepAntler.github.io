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

        // Instantiate two vehicle objects, and assigning them to the appropriate variables
        Vehicle vehicle1 = new Vehicle();
        Vehicle vehicle2 = new Vehicle();

        // Set some details on the first vehicle object
        vehicle1.make = "Toyota";
        vehicle1.model = "Corolla";
        vehicle1.year = 2013;
        vehicle1.color = "blue";

        // Set some details on the second vehicle object
        vehicle2.make = "Subaru";
        vehicle2.model = "Outback";
        vehicle2.year = 2018;
        vehicle2.color = "red";

        // Call the start method on both vehicles
        vehicle1.start();
        vehicle2.start();
    }
}
