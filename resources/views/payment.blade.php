<form action="{{ route('pay') }}" method="GET">
    @csrf
    <input type="number" name="amount" placeholder="Amount" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="number" name="discount" placeholder="Discount (%)" min="0" max="100">
    <button type="submit">Pay Now</button>
</form>
