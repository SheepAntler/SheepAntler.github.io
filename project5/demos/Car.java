package java111.project5.demos;

/**
 *  Car class represents a car in the Vehicle system
 *
 *  @author Elspeth Stalter-Clouse
 */
class Car extends Vehicle {
    private int numberOfCylinders;

    // no-arg constructor: creates a car
    public Car() {
        System.out.println("in the car constructor");
    }

    /** creates a car with number of cylinders
     #  @param numberOfCylinders
     */
    public Car(int numberOfCylinders) {
        // you need to call the no-arg constructor FIRST!
        // (before you call the more specific ones, that is)
        this(); // this(); is what calls the no-arg constructor
        System.out.println("in the car constructor; setting cylinder count");
        this.numberOfCylinders = numberOfCylinders;
    }

    /** creates a car with make, model, year, color, and cylinders
     *  @param make
     *  @param model
     *  @param year
     *  @param color
     *  @param numberOfCylinders
     */
    public Car(String make, String model, int year, String color, int numberOfCylinders) {
        // MUST be the first thing you declare
        // you cannot have both this(); and super(); calls in the same constructor for this reason
        // super(); calls constructors from the superclass
        super(make, model, year, color);
        this.numberOfCylinders = numberOfCylinders;
        System.out.println("in the car constructor; setting loads of car info!");
        /**
        setMake(make);
        setModel(model);
        setYear(year);
        setColor(color);
        */
    }


    /** returns value of numberOfCylinders
     * @return numberOfCylinders
     */
    public int getNumberOfCylinders() {
    	return numberOfCylinders;
    }

    /** Sets new value of numberOfCylinders
     * @param numberOfCylinders the numberOfCylinders to set
     */
    public void setNumberOfCylinders(int numberOfCylinders) {
    	this.numberOfCylinders = numberOfCylinders;
    }

    /**
     * @return a string representation of a car
     */
    public String toString() {
        return super.toString() + " It has " + numberOfCylinders + " cylinders.";
    }

    /** Drive the car
     */
    public void operate() {
        System.out.println("Driving the car.");
    }

    /** determines the cost of maintenance
     *  @return maintenance cost
     */
    public double determineMaintenanceCost() {
        return 250.00 * numberOfCylinders;
    }

}
