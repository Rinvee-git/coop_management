import { useState, useEffect } from 'react';
import { Calculator, Calendar, Percent, TrendingUp, ChevronLeft, ChevronRight } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '../components/ui/card';
import { Button } from '../components/ui/button';
import { Input } from '../components/ui/input';
import { Label } from '../components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '../components/ui/select';
import { Badge } from '../components/ui/badge';

const formatPeso = (amount: number) =>
  '₱' + amount.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

const ROWS_PER_PAGE = 12;

export function LoanCalculator() {
  const [loanAmount, setLoanAmount] = useState<number>(10000);
  const [interestRate, setInterestRate] = useState<number>(2.0);
  const [loanTerm, setLoanTerm] = useState<number>(12);
  const [loanType, setLoanType] = useState<string>('ecash');
  const [heroVisible, setHeroVisible] = useState(false);
  const [schedPage, setSchedPage] = useState(1);

  useEffect(() => {
    const t = setTimeout(() => setHeroVisible(true), 100);
    return () => clearTimeout(t);
  }, []);

  // Reset to page 1 whenever loan params change
  useEffect(() => { setSchedPage(1); }, [loanAmount, interestRate, loanTerm, loanType]);

  const loanTypeConfig: {
    [key: string]: {
      label: string;
      minRate: number;
      maxRate: number;
      maxMonths: number;
      maxAmount: number | null;
      amountStep: number;
      amountSliderMax: number;
      note: string;
    };
  } = {
    ecash: {
      label: 'E-Cash Loan',
      minRate: 0.1,
      maxRate: 3.0,
      maxMonths: 24,
      maxAmount: null,
      amountStep: 5000,
      amountSliderMax: 500000,
      note: 'No fixed loan limit. Collateral may be required for large amounts.',
    },
    guaranteed: {
      label: 'Guaranteed Loan',
      minRate: 0.1,
      maxRate: 2.0,
      maxMonths: 24,
      maxAmount: null,
      amountStep: 5000,
      amountSliderMax: 500000,
      note: 'Maximum is Share Capital × 2. Based on your fixed deposit.',
    },
    emergency: {
      label: 'Instant / Emergency Loan',
      minRate: 0.1,
      maxRate: 9.5,
      maxMonths: 3,
      maxAmount: 15000,
      amountStep: 500,
      amountSliderMax: 15000,
      note: 'Maximum loan amount is ₱15,000. Term up to 3 months only.',
    },
  };

  const config = loanTypeConfig[loanType];

  const handleLoanTypeChange = (value: string) => {
    setLoanType(value);
    const cfg = loanTypeConfig[value];
    setInterestRate(cfg.maxRate);
    setLoanTerm((prev) => Math.min(prev, cfg.maxMonths));
    if (cfg.maxAmount !== null) {
      setLoanAmount((prev) => Math.min(prev, cfg.maxAmount!));
    }
  };

  const handleInterestRateChange = (value: number) => {
    const clamped = Math.min(config.maxRate, Math.max(config.minRate, value));
    setInterestRate(parseFloat(clamped.toFixed(1)));
  };

  const handleLoanAmountChange = (value: number) => {
    if (config.maxAmount !== null) {
      setLoanAmount(Math.min(value, config.maxAmount));
    } else {
      setLoanAmount(value);
    }
  };

  const handleLoanTermChange = (value: number) => {
    setLoanTerm(Math.min(value, config.maxMonths));
  };

  const calculateMonthlyPayment = () => {
    const monthlyRate = interestRate / 100 / 12;
    if (monthlyRate === 0) return loanAmount / loanTerm;
    return (
      (loanAmount * monthlyRate * Math.pow(1 + monthlyRate, loanTerm)) /
      (Math.pow(1 + monthlyRate, loanTerm) - 1)
    );
  };

  const monthlyPayment = calculateMonthlyPayment();
  const totalPayment   = monthlyPayment * loanTerm;
  const totalInterest  = totalPayment - loanAmount;

  // Generate FULL schedule (all months)
  const generateFullSchedule = () => {
    const schedule = [];
    let balance = loanAmount;
    const monthlyRate = interestRate / 100 / 12;
    for (let month = 1; month <= loanTerm; month++) {
      const interestPayment  = balance * monthlyRate;
      const principalPayment = monthlyPayment - interestPayment;
      balance -= principalPayment;
      schedule.push({
        month,
        payment: monthlyPayment,
        principal: principalPayment,
        interest: interestPayment,
        balance: Math.max(0, balance),
      });
    }
    return schedule;
  };

  const fullSchedule = generateFullSchedule();
  const totalPages   = Math.ceil(fullSchedule.length / ROWS_PER_PAGE);
  const pagedRows    = fullSchedule.slice((schedPage - 1) * ROWS_PER_PAGE, schedPage * ROWS_PER_PAGE);

  const startMonth = (schedPage - 1) * ROWS_PER_PAGE + 1;
  const endMonth   = Math.min(schedPage * ROWS_PER_PAGE, loanTerm);

  return (
    <div className="flex flex-col">

      {/* ── Hero ── */}
      <section className="relative text-white py-24 sm:py-36 overflow-hidden">
        <div
          className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center"
          style={{ transition: 'transform 20s linear', transform: heroVisible ? 'scale(1)' : 'scale(1.05)' }}
        />
        <div className="absolute inset-0 bg-gradient-to-br from-black/70 via-primary/60 to-black/70" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="max-w-3xl">
            <Badge className="mb-4 bg-white/20 text-white border-white/30 backdrop-blur-sm">Financial Planning Tool</Badge>
            <h1 className="text-5xl sm:text-6xl font-bold mb-6 leading-tight">Loan Calculator</h1>
            <p className="text-xl text-blue-100 leading-relaxed">
              Estimate your monthly loan payments in Philippine Peso and plan your finances with our easy-to-use calculator.
            </p>
          </div>
        </div>
      </section>

      {/* ── Calculator ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid lg:grid-cols-2 gap-8">

            {/* Input Form */}
            <Card className="rounded-2xl bg-card/90 backdrop-blur-sm border-border/50 shadow-sm">
              <CardHeader>
                <CardTitle className="flex items-center gap-2">
                  <Calculator className="w-5 h-5" />
                  Loan Details
                </CardTitle>
              </CardHeader>
              <CardContent className="space-y-6">

                {/* Loan Type */}
                <div className="space-y-2">
                  <Label>Loan Type</Label>
                  <Select value={loanType} onValueChange={handleLoanTypeChange}>
                    <SelectTrigger className="rounded-lg"><SelectValue /></SelectTrigger>
                    <SelectContent>
                      <SelectItem value="ecash">E-Cash Loan</SelectItem>
                      <SelectItem value="guaranteed">Guaranteed Loan</SelectItem>
                      <SelectItem value="emergency">Instant / Emergency Loan</SelectItem>
                    </SelectContent>
                  </Select>
                  <p className="text-xs text-muted-foreground">{config.note}</p>
                </div>

                {/* Loan Amount */}
                <div className="space-y-2">
                  <Label htmlFor="loanAmount">Loan Amount (₱)</Label>
                  <div className="relative">
                    <span className="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground font-semibold text-sm">₱</span>
                    <Input
                      id="loanAmount"
                      type="number"
                      value={loanAmount}
                      onChange={(e) => handleLoanAmountChange(Number(e.target.value))}
                      className="pl-8 rounded-lg"
                      min="1000"
                      max={config.maxAmount ?? undefined}
                      step={config.amountStep}
                    />
                  </div>
                  <input
                    type="range"
                    min="1000"
                    max={config.maxAmount ?? config.amountSliderMax}
                    step={config.amountStep}
                    value={loanAmount}
                    onChange={(e) => handleLoanAmountChange(Number(e.target.value))}
                    className="w-full accent-primary"
                  />
                  <p className="text-xs text-muted-foreground">
                    {formatPeso(loanAmount)}
                    {config.maxAmount !== null && (
                      <span className="ml-2 text-orange-500 font-medium">Max: {formatPeso(config.maxAmount)}</span>
                    )}
                  </p>
                </div>

                {/* Interest Rate */}
                <div className="space-y-2">
                  <Label htmlFor="interestRate">Interest Rate (% per annum)</Label>
                  <div className="relative">
                    <Percent className="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" />
                    <Input
                      id="interestRate"
                      type="number"
                      value={interestRate}
                      onChange={(e) => handleInterestRateChange(Number(e.target.value))}
                      onBlur={(e) => handleInterestRateChange(Number(e.target.value))}
                      className="pl-9 rounded-lg"
                      min={config.minRate}
                      max={config.maxRate}
                      step="0.1"
                    />
                  </div>
                  <input
                    type="range"
                    min={config.minRate}
                    max={config.maxRate}
                    step="0.1"
                    value={interestRate}
                    onChange={(e) => handleInterestRateChange(Number(e.target.value))}
                    className="w-full accent-primary"
                  />
                  <p className="text-xs text-muted-foreground">
                    Maximum rate for this loan type: <span className="font-medium">{config.maxRate}%</span>
                  </p>
                </div>

                {/* Loan Term */}
                <div className="space-y-2">
                  <Label htmlFor="loanTerm">Loan Term (months)</Label>
                  <div className="relative">
                    <Calendar className="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" />
                    <Input
                      id="loanTerm"
                      type="number"
                      value={loanTerm}
                      onChange={(e) => handleLoanTermChange(Number(e.target.value))}
                      className="pl-9 rounded-lg"
                      min="1"
                      max={config.maxMonths}
                    />
                  </div>
                  <input
                    type="range"
                    min="1"
                    max={config.maxMonths}
                    value={loanTerm}
                    onChange={(e) => handleLoanTermChange(Number(e.target.value))}
                    className="w-full accent-primary"
                  />
                  <p className="text-xs text-muted-foreground">
                    {(loanTerm / 12).toFixed(1)} years
                    <span className="ml-2 text-orange-500 font-medium">Max: {config.maxMonths} months</span>
                  </p>
                </div>

                <Button className="w-full rounded-lg bg-gradient-to-r from-primary to-secondary font-semibold">
                  <Calculator className="w-4 h-4 mr-2" />
                  Calculate
                </Button>
              </CardContent>
            </Card>

            {/* Results */}
            <div className="space-y-6">
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <Card className="rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 text-white border-none shadow-lg">
                  <CardContent className="p-6">
                    <div className="flex items-center gap-2 mb-2">
                      <span className="text-lg font-bold opacity-90">₱</span>
                      <p className="text-sm opacity-90">Monthly Payment</p>
                    </div>
                    <p className="text-3xl font-bold">{formatPeso(monthlyPayment)}</p>
                  </CardContent>
                </Card>

                <Card className="rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 text-white border-none shadow-lg">
                  <CardContent className="p-6">
                    <div className="flex items-center gap-2 mb-2">
                      <TrendingUp className="w-5 h-5" />
                      <p className="text-sm opacity-90">Total Interest</p>
                    </div>
                    <p className="text-3xl font-bold">{formatPeso(totalInterest)}</p>
                  </CardContent>
                </Card>
              </div>

              <Card className="rounded-2xl bg-card/90 backdrop-blur-sm border-border/50 shadow-sm">
                <CardHeader><CardTitle>Payment Summary</CardTitle></CardHeader>
                <CardContent className="space-y-0">
                  {[
                    { label: 'Loan Type',       value: config.label,               highlight: false },
                    { label: 'Loan Amount',      value: formatPeso(loanAmount),     highlight: false },
                    { label: 'Interest Rate',    value: `${interestRate}% p.a.`,    highlight: false },
                    { label: 'Loan Term',        value: `${loanTerm} months`,       highlight: false },
                    { label: 'Monthly Payment',  value: formatPeso(monthlyPayment), highlight: true  },
                    { label: 'Total Interest',   value: formatPeso(totalInterest),  highlight: false },
                    { label: 'Total Payment',    value: formatPeso(totalPayment),   highlight: false },
                  ].map((row, i, arr) => (
                    <div key={i} className={`flex justify-between py-3 ${i < arr.length - 1 ? 'border-b border-border' : ''}`}>
                      <span className="text-muted-foreground">{row.label}</span>
                      <span className={`font-semibold ${row.highlight ? 'text-primary' : ''} ${i === arr.length - 1 ? 'text-lg' : ''}`}>
                        {row.value}
                      </span>
                    </div>
                  ))}
                </CardContent>
              </Card>
            </div>
          </div>
        </div>
      </section>

      {/* ── Amortization Schedule ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center" />
        <div className="absolute inset-0 bg-black/75" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

          {/* Header row: title + top pagination */}
          <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-10">
            <div>
              <h2 className="text-3xl sm:text-4xl font-bold text-white">Amortization Schedule</h2>
              <p className="text-white/60 text-sm mt-1">
                {loanTerm} month{loanTerm !== 1 ? 's' : ''} total &mdash; showing months {startMonth}–{endMonth}
              </p>
            </div>

            {totalPages > 1 && (
              <div className="flex items-center gap-2">
                <Button
                  variant="outline"
                  size="sm"
                  onClick={() => setSchedPage((p) => Math.max(1, p - 1))}
                  disabled={schedPage === 1}
                  className="bg-white/10 border-white/20 text-white hover:bg-white/20 disabled:opacity-40 rounded-lg"
                >
                  <ChevronLeft className="w-4 h-4 mr-1" />
                  Prev
                </Button>

                <div className="flex items-center gap-1">
                  {Array.from({ length: totalPages }, (_, i) => i + 1).map((page) => (
                    <button
                      key={page}
                      onClick={() => setSchedPage(page)}
                      className={`w-8 h-8 rounded-lg text-sm font-medium transition-colors ${
                        page === schedPage
                          ? 'bg-white text-black'
                          : 'bg-white/10 text-white hover:bg-white/20'
                      }`}
                    >
                      {page}
                    </button>
                  ))}
                </div>

                <Button
                  variant="outline"
                  size="sm"
                  onClick={() => setSchedPage((p) => Math.min(totalPages, p + 1))}
                  disabled={schedPage === totalPages}
                  className="bg-white/10 border-white/20 text-white hover:bg-white/20 disabled:opacity-40 rounded-lg"
                >
                  Next
                  <ChevronRight className="w-4 h-4 ml-1" />
                </Button>
              </div>
            )}
          </div>

          <Card className="rounded-2xl overflow-hidden bg-white/10 border-white/20 backdrop-blur-md">
            <div className="overflow-x-auto">
              <table className="w-full">
                <thead className="bg-white/10">
                  <tr>
                    <th className="text-left p-4 font-semibold text-white">Month</th>
                    <th className="text-right p-4 font-semibold text-white">Payment</th>
                    <th className="text-right p-4 font-semibold text-white">Principal</th>
                    <th className="text-right p-4 font-semibold text-white">Interest</th>
                    <th className="text-right p-4 font-semibold text-white">Balance</th>
                  </tr>
                </thead>
                <tbody className="divide-y divide-white/10">
                  {pagedRows.map((row) => (
                    <tr key={row.month} className="hover:bg-white/10 transition-colors">
                      <td className="p-4 text-white/90 font-medium">{row.month}</td>
                      <td className="text-right p-4 text-white/90">{formatPeso(row.payment)}</td>
                      <td className="text-right p-4 text-green-400 font-medium">{formatPeso(row.principal)}</td>
                      <td className="text-right p-4 text-orange-400 font-medium">{formatPeso(row.interest)}</td>
                      <td className="text-right p-4 text-white font-semibold">{formatPeso(row.balance)}</td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </Card>

          {/* Bottom pagination */}
          {totalPages > 1 && (
            <div className="flex items-center justify-center gap-3 mt-6">
              <Button
                variant="outline"
                size="sm"
                onClick={() => setSchedPage((p) => Math.max(1, p - 1))}
                disabled={schedPage === 1}
                className="bg-white/10 border-white/20 text-white hover:bg-white/20 disabled:opacity-40 rounded-lg"
              >
                <ChevronLeft className="w-4 h-4 mr-1" />
                Prev
              </Button>
              <span className="text-white/60 text-sm">Page {schedPage} of {totalPages}</span>
              <Button
                variant="outline"
                size="sm"
                onClick={() => setSchedPage((p) => Math.min(totalPages, p + 1))}
                disabled={schedPage === totalPages}
                className="bg-white/10 border-white/20 text-white hover:bg-white/20 disabled:opacity-40 rounded-lg"
              >
                Next
                <ChevronRight className="w-4 h-4 ml-1" />
              </Button>
            </div>
          )}

        </div>
      </section>

    </div>
  );
}