package java111.project5.demos;

/**
 *  Airplane class represents an airplane in the Vehicle system
 *
 *  @author Elspeth Stalter-Clouse
 */
class Airplane extends Vehicle {
    private int numberOfEngines;

    /** get the number of engines
     * @return numberOfEngines
     */
    public int getNumberOfEngines() {
    	return numberOfEngines;
    }

    /** set the number of engines
     * @param numberOfEngines the numberOfEngines to set
     */
    public void setNumberOfEngines(int numberOfEngines) {
    	this.numberOfEngines = numberOfEngines;
    }

    /** @return a String representation of a car
     */
    public String toString() {
        return super.toString() + " It has " + numberOfEngines + " engines.";
    }

    /** fly the airplane
     */
    public void operate() {
        System.out.println("Flying the airplane.");
    }

    /** determines the cost of maintenance
     *  @return maintenance cost
     */
    public double determineMaintenanceCost() {
        return 250.00 * numberOfEngines;
    }
}
