import { Link } from 'react-router';
import { Wallet, PiggyBank, TrendingUp, Shield, Gift, ArrowRight } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '../components/ui/card';
import { Button } from '../components/ui/button';
import { Badge } from '../components/ui/badge';
import { useEffect, useState } from 'react';

export function Deposits() {
  const [heroVisible, setHeroVisible] = useState(false);
  useEffect(() => {
    const t = setTimeout(() => setHeroVisible(true), 100);
    return () => clearTimeout(t);
  }, []);

  const savingsProducts = [
    {
      icon: Wallet,
      title: 'Regular Savings',
      description: 'Build your savings with our flexible regular savings account designed for everyday needs.',
      features: ['Minimum deposit: ₱100', 'Withdrawable anytime', 'Monthly interest', 'No maintaining balance'],
      rate: '2.5%',
      gradient: 'from-blue-500 to-blue-600'
    },
    {
      icon: PiggyBank,
      title: 'Time Deposit',
      description: 'Earn higher returns with our time deposit accounts with fixed terms and guaranteed rates.',
      features: ['Minimum deposit: ₱5,000', '6, 12, or 24 month terms', 'Higher interest rates', 'Auto-renewal option'],
      rate: '4.5% - 6.0%',
      gradient: 'from-green-500 to-green-600'
    },
    {
      icon: TrendingUp,
      title: 'High-Yield Savings',
      description: 'Maximize your earnings with premium interest rates for higher balance accounts.',
      features: ['Minimum deposit: ₱10,000', 'Tiered interest rates', 'Quarterly bonuses', 'Priority service'],
      rate: '3.5% - 5.0%',
      gradient: 'from-purple-500 to-purple-600'
    },
    {
      icon: Shield,
      title: 'Special Savings',
      description: 'Dedicated savings for specific goals like education, vacation, or emergency funds.',
      features: ['Flexible deposits', 'Goal-oriented savings', 'Competitive rates', 'No penalty withdrawals'],
      rate: '3.0%',
      gradient: 'from-orange-500 to-orange-600'
    },
    {
      icon: Gift,
      title: 'Junior Savers',
      description: "Start your child's financial journey early with our junior savings account.",
      features: ['Ages 0-17', 'Low minimum deposit: ₱50', 'Financial literacy programs', 'Parental monitoring'],
      rate: '2.5%',
      gradient: 'from-pink-500 to-pink-600'
    }
  ];

  const benefits = [
    { title: 'PDIC Insured', description: 'All deposits insured up to ₱250,000 per account', icon: Shield },
    { title: 'Competitive Rates', description: 'Industry-leading interest rates on all savings products', icon: TrendingUp },
    { title: 'Easy Access', description: 'Multiple channels for deposits and withdrawals', icon: Wallet },
    { title: 'Member Rewards', description: 'Exclusive perks and bonuses for loyal members', icon: Gift },
  ];

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
            <Badge className="mb-4 bg-white/20 text-white border-white/30 backdrop-blur-sm">Grow Your Wealth</Badge>
            <h1 className="text-5xl sm:text-6xl font-bold mb-6 leading-tight">Savings & Deposits</h1>
            <p className="text-xl text-blue-100 leading-relaxed">
              Secure your financial future with our range of savings and deposit products.
              Enjoy competitive interest rates and the security of cooperative banking.
            </p>
          </div>
        </div>
      </section>

      {/* ── Savings Products Grid ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-14">
            <h2 className="text-3xl sm:text-4xl font-bold mb-4">Our Savings Products</h2>
            <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
              Choose the savings solution that fits your financial goals
            </p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {savingsProducts.map((product, index) => (
              <Card key={index} className="hover:shadow-xl transition-all duration-300 hover:-translate-y-1 rounded-2xl border-border/50 bg-card/90 backdrop-blur-sm">
                <CardHeader>
                  <div className={`w-14 h-14 rounded-xl bg-gradient-to-br ${product.gradient} flex items-center justify-center mb-4 shadow-lg`}>
                    <product.icon className="w-7 h-7 text-white" />
                  </div>
                  <CardTitle>{product.title}</CardTitle>
                  <Badge variant="secondary" className="w-fit mt-2">{product.rate} per annum</Badge>
                </CardHeader>
                <CardContent className="space-y-4">
                  <p className="text-sm text-muted-foreground">{product.description}</p>
                  <div className="space-y-2">
                    <p className="text-sm font-medium">Features:</p>
                    <ul className="space-y-1">
                      {product.features.map((feature, idx) => (
                        <li key={idx} className="text-sm text-muted-foreground flex items-start gap-2">
                          <span className="text-primary mt-0.5">•</span>
                          {feature}
                        </li>
                      ))}
                    </ul>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* ── Benefits ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center" />
        <div className="absolute inset-0 bg-black/75" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-14">
            <h2 className="text-3xl sm:text-4xl font-bold mb-4 text-white">Why Save With Us</h2>
            <p className="text-lg text-white/70 max-w-2xl mx-auto">
              Experience the advantages of cooperative savings
            </p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {benefits.map((benefit, index) => (
              <Card key={index} className="rounded-2xl bg-white/10 border-white/20 backdrop-blur-md hover:bg-white/15 transition-all duration-300 hover:-translate-y-1">
                <CardContent className="p-6 text-center">
                  <div className="w-14 h-14 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center mb-4 shadow-lg mx-auto">
                    <benefit.icon className="w-7 h-7 text-white" />
                  </div>
                  <h3 className="font-semibold mb-2 text-white">{benefit.title}</h3>
                  <p className="text-sm text-white/70">{benefit.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* ── Interest Rates Table ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl sm:text-4xl font-bold mb-10 text-center">Current Interest Rates</h2>
          <Card className="rounded-2xl overflow-hidden bg-card/90 backdrop-blur-sm">
            <div className="overflow-x-auto">
              <table className="w-full">
                <thead className="bg-muted">
                  <tr>
                    <th className="text-left p-4 font-semibold">Product Type</th>
                    <th className="text-left p-4 font-semibold">Minimum Deposit</th>
                    <th className="text-left p-4 font-semibold">Interest Rate</th>
                    <th className="text-left p-4 font-semibold">Term</th>
                  </tr>
                </thead>
                <tbody className="divide-y divide-border">
                  {[
                    ['Regular Savings', '₱100', '2.5% p.a.', 'No lock-in'],
                    ['Time Deposit (6 months)', '₱5,000', '4.5% p.a.', '6 months'],
                    ['Time Deposit (12 months)', '₱5,000', '5.5% p.a.', '12 months'],
                    ['Time Deposit (24 months)', '₱5,000', '6.0% p.a.', '24 months'],
                    ['High-Yield Savings', '₱10,000', '3.5% - 5.0% p.a.', 'No lock-in'],
                    ['Special Savings', '₱500', '3.0% p.a.', 'Flexible'],
                    ['Junior Savers', '₱50', '2.5% p.a.', 'No lock-in'],
                  ].map(([type, min, rate, term], i) => (
                    <tr key={i} className="hover:bg-muted/40 transition-colors">
                      <td className="p-4">{type}</td>
                      <td className="p-4">{min}</td>
                      <td className="p-4 text-primary font-medium">{rate}</td>
                      <td className="p-4">{term}</td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </Card>
          <p className="text-sm text-muted-foreground text-center mt-4">
            * Rates are subject to change. Contact us for the most current rates.
          </p>
        </div>
      </section>

      {/* ── CTA ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <Card className="bg-gradient-to-br from-primary via-primary to-secondary text-white border-none shadow-2xl rounded-3xl overflow-hidden">
            <CardContent className="p-12 sm:p-16 text-center relative">
              <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-10" />
              <div className="relative z-10">
                <h2 className="text-3xl sm:text-4xl font-bold mb-4">Start Saving Today</h2>
                <p className="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">
                  Open a savings account and take the first step towards financial security.
                  Our team is here to help you choose the right product.
                </p>
                <div className="flex flex-col sm:flex-row gap-4 justify-center">
                  <Button asChild size="lg" className="bg-white text-primary hover:bg-blue-50 shadow-xl rounded-xl font-bold">
                    <Link to="/membership/apply">
                      Become a Member
                      <ArrowRight className="ml-2 w-5 h-5" />
                    </Link>
                  </Button>
                  <Button asChild size="lg" variant="outline" className="cta-btn-secondary bg-transparent border-white/40 !text-white hover:!text-white hover:bg-white/15 rounded-xl font-semibold px-8 backdrop-blur-sm !bg-transparent">
  <Link to="/contact">Get In Touch</Link>
</Button>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
      </section>

    </div>
  );
}