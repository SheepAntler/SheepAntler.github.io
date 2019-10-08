/** Represents a vehicle. This will be used for a demo
 *  throughout the semester.
 *
 * @author Elspeth Stalter-Clouse
 */

public class Vehicle {
    // Instance variables/attributes
    String make;
    String model;
    int year;
    String color;

    /** display information about the vehicle and a message that
     *  tells the user the vehicle has started
     */
    public void start() {
        System.out.println("The " + year + " " + make + " " + model +
                " is starting.");
    }
}
