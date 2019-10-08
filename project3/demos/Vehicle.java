/** Represents a vehicle. This will be used for a demo
 *  throughout the semester.
 *
 * @author Elspeth Stalter-Clouse
 */

public class Vehicle {
    // Instance variables/attributes
    private String make;
    private String model;
    private int year;
    private String color;

    /** sets the vehicle's make
     *  @param make vehicle's make
     */
    public void setMake(String newMake) {
        make = newMake;
    }

    /** sets the vehicle's model
     *  @param model vehicle's model
     */
    public void setModel(String newModel) {
        model = newModel;
    }

    /** sets the vehicle's year
     *  @param year vehicle's year
     */
    public void setYear(int newYear) {
        year = newYear;
    }

    /** sets the vehicle's color
     *  @param color vehicle's color
     */
    public void setColor(String newColor) {
        color = newColor;
    }


    /** display information about the vehicle and a message that
     *  tells the user the vehicle has started
     */
    public void start() {
        System.out.println("The " + year + " " + make + " " + model +
                " is starting.");
    }
}
