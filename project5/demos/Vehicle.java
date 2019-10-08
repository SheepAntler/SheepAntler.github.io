package java111.project5.demos;

/** Represents a vehicle. This will be used for a demo
 *  throughout the semester.
 *
 * @author Elspeth Stalter-Clouse
 */

public abstract class Vehicle implements Maintainable {
    // Instance variables/attributes
    private String make;
    private String model;
    private int year;
    private String color;
    static int numberOfVehicles;

    /** creates a vehicle
     */
    public Vehicle() {
        numberOfVehicles++;
        System.out.println("in the vehicle no-arg/default constructor");
    }

    /** creates a car with make, model, year, color, and cylinders
     *  @param make
     *  @param model
     *  @param year
     *  @param color
     */
    public Vehicle(String make, String model, int year, String color) {
        // we call this to avoid missing code from previous constructors
        // we also call this to avoid replicating code from other constructors needlessly
        this();
        System.out.println("in the vehicle constructor; setting all the values!");
        this.make = make;
        this.model = model;
        this.year = year;
        this.color = color;
    }

    /**
     * @return the make
     */
    public String getMake() {
    	return make;
    }

    /** sets the vehicle's make
     *  @param make vehicle's make
     */
    public void setMake(String newMake) {
        make = newMake;
    }

    /** gets the vehicle's model
     *  @return model
     */
    public String getModel() {
        return model;
    }

    /** sets the vehicle's model
     *  @param model vehicle's model
     */
    public void setModel(String newModel) {
        model = newModel;
    }

    /**
     * @return the year
     */
    public int getYear() {
        return year;
    }

    /** sets the vehicle's year
     *  @param year vehicle's year
     */
    public void setYear(int newYear) {
        year = newYear;
    }

    /** gets the vehicle's model
     *  @return color
     */
    public String getColor() {
        return color;
    }

    /** sets the vehicle's color
     *  @param color vehicle's color
     */
    public void setColor(String newColor) {
        color = newColor;
    }

    // HOW TO OVERRIDE toString() !!!!!!!!!!!!!!!!!!!!

    /** display information about the vehicle and a message that
     *  tells the user the vehicle has started
     *  @return a string representation of a Vehicle
     */
    public String toString() {
        return "The " + color + " " + year + " " + make + " "
                + model + " is starting.";
    }

    // NEW METHOD to practice ABSTRACT METHODS

    /** this abstract method defines how the vehicle is "driven" or controlled
     */
    public abstract void operate();
    // just end it with a semicolon; no cruly braces
}
