/** This class represents a Client object. It will contain constants, some
 *  instance variables (along with their get/set methods), and three
 *  methods to calculate each client's lawn area, season charge, and service
 *  charge, respectively.
 *
 *  @author Elspeth Stalter-Clouse
 */
public class Client {
    // constants
    static final int SEASON_LENGTH = 22;
    static final int LOWER_LAWN_BOUNDARY = 500;
    static final int UPPER_LAWN_BOUNDARY = 800;
    static final int SMALL_LAWN_RATE = 25;
    static final int MEDIUM_LAWN_RATE = 35;
    static final int LARGE_LAWN_RATE = 50;
    static final int TWO_SERVICE_CHARGE = 5;
    static final int TWENTY_TWO_SERVICE_CHARGE = 3;
    static final int DOUBLE_PAYMENTS = 2;

    // instance variables
    private String clientName;
    private double lawnLength;
    private double lawnWidth;
    private int paymentPlan;

    // get-and-set
    /** get the clientName
     *  @return clientName
     */
    public String getClientName() {
        return clientName;
    }

    /** set the clientName
     *  @param clientName
     */
    public void setClientName(String clientName) {
        this.clientName = clientName;
    }

    /** get the lawnLength
     *  @return lawnLength
     */
    public double getLawnLength() {
        return lawnLength;
    }

    /** set the lawnLength
     *  @param lawnLength
     */
    public void setLawnLength(double lawnLength) {
        this.lawnLength = lawnLength;
    }

    /** get the lawnWidth
     *  @return lawnWidth
     */
    public double getLawnWidth() {
        return lawnWidth;
    }

    /** set the lawnWidth
     *  @param lawnWidth
     */
    public void setLawnWidth(double lawnWidth) {
        this.lawnWidth = lawnWidth;
    }

    /** get the paymentPlan
     *  @return paymentPlan
     */
    public int getPaymentPlan() {
        return paymentPlan;
    }

    /** set the paymentPlan
     *  @param paymentPlan
     */
    public void setPaymentPlan(int paymentPlan) {
        this.paymentPlan = paymentPlan;
    }

    /** This method will return the area of the client's lawn
     *  @return lawn area
     */
    public double calculateLawnArea() {
        return getLawnLength() * getLawnWidth();
    }

    /** This method will calculate the client's total season charge
     *  @return seasonCharge
     */
    public double calculateSeasonCharge() {
        // local variable to temporarily hold the seasonCharge
        double seasonCharge = 0;

        if ((getLawnLength() * getLawnWidth()) < LOWER_LAWN_BOUNDARY) {
            seasonCharge = SEASON_LENGTH * SMALL_LAWN_RATE;
        } else if ((getLawnLength() * getLawnWidth()) >= LOWER_LAWN_BOUNDARY &&
                (getLawnLength() * getLawnWidth()) < UPPER_LAWN_BOUNDARY) {
            seasonCharge = SEASON_LENGTH * MEDIUM_LAWN_RATE;
        } else if ((getLawnLength() * getLawnWidth()) >= UPPER_LAWN_BOUNDARY) {
            seasonCharge = SEASON_LENGTH * LARGE_LAWN_RATE;
        }

        // return the calculation
        return seasonCharge;
    }

    /** This method will calculate the client's charge per service
     *  @return serviceCharge
     */
    public double calculateServiceCharge() {
        // local variable to temporarily hold the serviceCharge
        double serviceCharge = 0;

        if (getPaymentPlan() == 1) {
            serviceCharge = calculateSeasonCharge();
        } else if (getPaymentPlan() == 2) {
            serviceCharge = (calculateSeasonCharge() / 2) + TWO_SERVICE_CHARGE;
        } else if (getPaymentPlan() == 22) {
            serviceCharge = (calculateSeasonCharge() / 22) + TWENTY_TWO_SERVICE_CHARGE;
        }

        // return the calculation
        return serviceCharge;
    }

    /** This method will calculate the total amount owed by the client
     *  including the service charge
     *  @return totalCost
     */
    public double calculateTotalCost() {
        // local variable to temporarily hold the totalCost
        double totalCost = 0;

        if (getPaymentPlan() == 1) {
            totalCost = calculateSeasonCharge();
        } else if (getPaymentPlan() == 2) {
            totalCost = calculateServiceCharge() * DOUBLE_PAYMENTS;
        } else if (getPaymentPlan() == 22) {
            totalCost = calculateServiceCharge() * SEASON_LENGTH;
        }

        // return the calculation
        return totalCost;
    }

}
