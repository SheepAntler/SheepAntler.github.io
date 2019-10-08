/** Create a vehicle factory and start it running.
 *
 * @author Elspeth Stalter-Clouse
 */

public class VehicleFactoryTestDrive {

    /** Instantiate 2 vehicle objects
     *  and call the start method on each one.
     *
     * @param args command line arguments (not used here)
     */
    public static void main(String[] args) {
        // Instantiate one vehicle factory and call the run method
        VehicleFactory vehicleFactoryTest = new VehicleFactory();

        vehicleFactoryTest.run();
    }

}
