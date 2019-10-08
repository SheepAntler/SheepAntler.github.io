package java111.project5.demos;

/** the maintainable interface for any item
 *  that needs to be maintained.
 *
 *  @author Elspeth Stalter-Clouse
 */
public interface Maintainable {

    /** determines the cost of maintenance
     *  @return maintenance cost
     */
    public abstract double determineMaintenanceCost();
}
